<?php

namespace app;

use DB;
use Faker\Factory;

class ReportGenerator
{
    public function __construct()
    {
        $this->faker = Factory::create();
    }

    public function generate()
    {
        $row = $this->fetchSentence('beginning');

        if (!$row) {
            abort(404);
        }
        $sentences[] = $row->text;
        $ids[] = $row->id;

        $length = rand(3, 5);
        for ($i = 0; $i < $length; $i++) {
            $row = $this->fetchSentence('middle', $ids);
            $sentences[] = $row->text;
            $ids[] = $row->id;
        }

        $row = $this->fetchSentence('end');
        $sentences[] = $row->text;

        // Glue the report together
        $report = implode('. ', $sentences) . ".";

        // Fill in the blanks...
        $report = $this->fillInTheBlanks($report);

        return $report;
    }

    /**
     * Retrieve a single sentence from the database
     * @param  string $type      The sentence category to draw upon
     * @param  array  $excluding Sentence IDs to be skipped
     * @return stdClass
     */
    protected function fetchSentence($type, array $excluding = array())
    {
        return \DB::table('sentences')->where('type', $type)->whereNotIn('id', $excluding)->inRandomOrder()->first();
    }

    /**
     * Use fake data to fill in any bracketed placeholder text with suitable replacements
     *
     * https://stackoverflow.com/questions/1252693/using-str-replace-so-that-it-only-acts-on-the-first-match/1252710#1252710
     *
     * @param  string $report
     * @return string
     */
    public function fillInTheBlanks($report)
    {
        // First names
        while ($pos = strpos($report, '[first-name]')) {
            $name = $this->faker->firstName();
            $report = substr_replace($report, $name, $pos, strlen('[first-name]'));
        }

        // Last names
        while ($pos = strpos($report, '[last-name]')) {
            $name = $this->faker->lastName();
            $report = substr_replace($report, $name, $pos, strlen('[last-name]'));
        }

        return $report;
    }
}
