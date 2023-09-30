<?php

namespace App\Http\Controllers;



use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    public function index()
    {
        return view('exchange');
    }

}
