<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;


class GeoLocationController extends Controller
{
    public function index(Request $request)
    {
        $ip = $request->ip();
        //Local ip is not support so i take random ip
        $ip = '8.8.8.8';
        $currentUserInfo = Location::get($ip);
        $cookie = cookie('user_ip', $ip, 60,);
        return response()->view('location', compact('currentUserInfo'))->withCookie($cookie);
    }
}
