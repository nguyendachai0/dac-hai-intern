<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Http\Request;

class ClosureMiddleware extends Controller
{
    public function __construct()
    {
        $this->middleware(function (Request $request, Closure $next) {

            echo "This is closure request";
            return $next($request);
        });
    }
    public  function index()
    {
        return "<br> Closure";
    }
}
