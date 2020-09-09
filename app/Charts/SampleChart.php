<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\BaseChart;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Support\Facades\Request;

class SampleChart extends BaseChart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handler(Request $request) : Chart
    {
        return Chart::build()->labels(['First', 'Second', 'Third'])
            ->dataset('Sample', [1, 2, 3])
            ->dataset('Sample 2', [3, 2, 1]);
    }
}
