<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 12/03/15
 * Time: 1:10
 */

namespace App\Http\Controllers\Admin;


use App\Helpers\AdminMenu;
use App\Http\Controllers\Controller;

class AdminController extends  Controller {
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $menu = AdminMenu::menu();
        return view('admin.home.home',compact('menu'));
    }
}