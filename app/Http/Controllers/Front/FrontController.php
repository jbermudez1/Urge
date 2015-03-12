<?php namespace App\Http\Controllers\Front;
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 8/03/15
 * Time: 1:26
 */

use  App\Http\Controllers\Controller;

class FrontController extends Controller {

    function getHome()
    {
        return view('front.index');
    }

    function getNosotros()
    {
        return view('front.nosotros');
    }

    function getOficinas()
    {
        return view('front.oficinas');
    }
}