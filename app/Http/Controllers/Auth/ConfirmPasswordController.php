<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;


class ConfirmPasswordController extends Controller
{
    public function confirm()
    {
        return view('index');
    }


    public function showConfirmForm()
    {
        return view('index');
    }
}
