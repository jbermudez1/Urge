<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 12/03/15
 * Time: 1:10
 */

namespace App\Http\Controllers\Admin;


class AdminController {
    public function index()
    {
        return view('admin.home.home');
    }
}