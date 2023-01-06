<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class DonationController extends Controller
{

    public function show (){

        return view('donation');
    }
}