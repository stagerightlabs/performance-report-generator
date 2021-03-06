<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\ReportGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct(ReportGenerator $reporter)
    {
        $this->reporter = $reporter;
    }
    /**
     * Show a generated performance report.
     *
     * @param  int  $id
     * @return Response
     */
    public function showReport()
    {
        // Generate a report
        $report = $this->reporter->generate();

        return view('show', ['report' => $report]);
    }

    /**
     * Show the donation form
     *
     * @return Response
     */
    public function donationForm()
    {
        return view('form');
    }

    /**
     * Handle the submission of a donation
     *
     * @param  Request $request
     * @return Response
     */
    public function processDonation(Request $request)
    {
        // Check the ReCaptcha Field
        $client = new Client();
        $response = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => env('RECAPTCHA_KEY'),
                'response' => $request->get('g-recaptcha-response'),
                'remoteip' => $request->ip()
            ]
        ]);
        $result = json_decode($response->getBody()->getContents())->success;

        if (!$result) {
            return redirect('/error');
        }

        // Process the submitted text
        $text = e($request->get('content'));

        // Is there any content to work with?
        if (empty($text)) {
            return redirect('/donate');
        }

        $text = $this->textFilter($text);
        $wordCount = str_word_count($text);
        $sentences = explode('.', $text);
        $sentences = array_filter(array_map('trim', $sentences));
        $sentenceCount = count($sentences);

        // Split out the sentences
        $firstSentence = array_shift($sentences);
        $lastSentence = array_pop($sentences);

        // Save the first sentence
        if ($firstSentence) {
            $this->saveSentence($firstSentence, 'beginning');
        }

        // Save the last sentence
        if ($lastSentence) {
            $this->saveSentence($lastSentence, 'end');
        }

        // Save the middle sentences
        foreach ($sentences as $sentence) {
            $this->saveSentence($sentence, 'middle');
        }

        return view('success', ['wordCount' => $wordCount, 'sentenceCount' => $sentenceCount]);
    }

    protected function saveSentence($sentence, $type)
    {
        DB::table('sentences')->insert([
            'text' => $sentence,
            'type' => $type,
            'word_count' => str_word_count($sentence)
        ]);
    }

    protected function textFilter($sentence)
    {
        $filtered = str_replace('Mr.', 'Mr&#46;', $sentence);
        $filtered = str_replace('Ms.', 'Ms&#46;', $filtered);
        $filtered = str_replace('Mrs.', 'Mrs&#46;', $filtered);

        return $filtered;
    }
}
