<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use GuzzleHttp\Client;
use DB;

class ReportController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function showReport()
    {
        // Generate a report
        $sentences[] = DB::table('sentences')->where('type', 'beginning')->orderByRaw('RAND()')->first()->text;

        $length = rand(3,5);
        for ($i=0; $i < $length; $i++) {
            $sentences[] = DB::table('sentences')->where('type', 'middle')->orderByRaw('RAND()')->first()->text;
        }

        $sentences[] = DB::table('sentences')->where('type', 'end')->orderByRaw('RAND()')->first()->text;

        // Glue the report together
        $report = implode('. ', $sentences) . ".";

        return view('show', ['report' => $report]);
    }

    /**
     * Show the donation form
     * @return Response
     */
    public function donationForm()
    {
        return view('form');
    }

    /**
     * Handle the submission of the donation form
     * @param  Request $request
     * @return Response
     */
    public function processDonation(Request $request)
    {
        // Check the ReCaptcha Field
        // $client = new Client();
        // $response = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
        //     'form_params' => [
        //         'secret' => '6LdfYg0TAAAAAFsljx-eT9eC-gC-QyrOVEBVSbDg',
        //         'response' => $request->get('g-recaptcha-response'),
        //         'remoteip' => $request->ip()
        //     ]
        // ]);
        // $result = json_decode($response->getBody()->getContents())->success;

        // if (!$result) {
        //     return redirect('/error');
        // }

        // Process the submitted text
        $text = e($request->get('content'));
        $wordCount = str_word_count($text);
        $sentences = explode('.', $text);
        $sentences = array_filter(array_map('trim',$sentences));
        $sentenceCount = count($sentences);

        // Save the first sentence
        $this->saveSentence(array_shift($sentences), 'beginning');

        // Save the last sentence
        $this->saveSentence(array_pop($sentences), 'end');

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
}