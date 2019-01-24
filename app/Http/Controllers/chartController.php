<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\SampleChart;
use App\User;


class chartController extends Controller
{
    public function makeChart()

    {

        $chart = new SampleChart;
        return view('chart');

    }
}
