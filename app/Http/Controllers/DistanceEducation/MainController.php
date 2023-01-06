<?php

namespace App\Http\Controllers\DistanceEducation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function covidPage()
    {
        return view('sections.distance_education.covid.index');
    }
}
