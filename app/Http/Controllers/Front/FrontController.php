<?php namespace App\Http\Controllers\Front;
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 8/03/15
 * Time: 1:26
 */

use App\Repositories\NoticeRepo;
use  App\Http\Controllers\Controller;

class FrontController extends Controller {
    protected $noticeRepo;
    public function __construct(NoticeRepo $noticeRepo)
    {
        $this->noticeRepo = $noticeRepo;
    }

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

    function getNoticias()
    {
        $notices = $this->noticeRepo->getOrderByDate();
        return view('front.noticias',compact('notices'));
    }

    function getNoticia($id)
    {
        $notice =  $this->noticeRepo->findOrFail($id);
        return view('front.noticia',compact('notice'));
    }
}