<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProEducation;

class ProfessionalController extends Controller
{
    public function index() {
        $data = ProEducation::all();
        dd($data);
    }
}
