<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Train;
use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;

class PageController extends Controller
{
    public function index(){
        $trains = Train::whereDate('departure_date', date_format(new DateTime("now", new DateTimeZone('Europe/Rome')),'Y-m-d'))->orderBy('departure_date')->get();
        return view('home',compact('trains'));
    }
    
}
