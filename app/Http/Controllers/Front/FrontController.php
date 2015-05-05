<?php namespace App\Http\Controllers\Front;
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 8/03/15
 * Time: 1:26
 */

use App\Repositories\CategoryGuideRepo;
use App\Repositories\GuideTownRepo;
use App\Repositories\NoticeRepo;
use App\Http\Controllers\Controller;
use App\Repositories\TownRepo;
use Illuminate\Http\Request;

class FrontController extends Controller {
    protected $noticeRepo;
    protected $townRepo;
    protected $categoryGuideRepo;
    protected $guideTownRepo;

    protected $rulesEmail = array(
        'email' => 'required|email',
        'asunto' => 'required|min:4',
        'mensaje' => 'required|min:10'
    );

    public function __construct(NoticeRepo $noticeRepo,
                                TownRepo $townRepo,
                                CategoryGuideRepo $categoryGuideRepo,
                                GuideTownRepo $guideTownRepo)
    {
        $this->noticeRepo = $noticeRepo;
        $this->townRepo = $townRepo;
        $this->categoryGuideRepo = $categoryGuideRepo;
        $this->guideTownRepo = $guideTownRepo;
    }

    // Functions for filters and search
    function getGuias(Request $request)
    {
        $idtown = $request->get('idtown');
        $idcategoryguide = $request->get('idcategoryguide');

        $search = $request->get('search','');

        if(trim($search)!="")
        {
            $guides = $this->guideTownRepo->getGuidesBySearch($search);
        }
        else
        {
            $guides = $this->guideTownRepo->getGuides($idtown,$idcategoryguide);
        }


        return view('front.procedures.guides',compact('guides'));
    }

    function getGuiaUnica($id)
    {
        $guide_town = $this->guideTownRepo->findByIdWithRelations($id);

        return view('front.procedures.guide_detail',compact('guide_town'));
    }

    function getHome()
    {
        $towns = $this->townRepo->lists();
        $categoryguides = $this->categoryGuideRepo->lists();

        return view('front.index',compact('towns','categoryguides'));
    }

    function getNosotros()
    {
        return view('front.nosotros');
    }

    function getOficinas()
    {
        return view('front.oficinas');
    }
    function getRegulaciones()
    {
        return view('front.regulaciones');
    }
    function getGuiatramites()
    {
        return view('front.guiatramites');
    }
    function getNoticias()
    {
        $notices = $this->noticeRepo->getOrderByDate();
        return view('front.noticias',compact('notices'));
    }

    function getContacto()
    {
        return view('front.contacto');
    }

    function getNoticia($id)
    {
        $notice =  $this->noticeRepo->findOrFail($id);
        return view('front.noticia',compact('notice'));
    }

    function postSend(Request $request)
    {
        $data = $request->all();

        $validator = \Validator::make($data, $this->rulesEmail);
        if ($validator->fails())
        {
            return redirect('contacto')->withErrors($validator);
        }
        else
        {
            \Mail::send('emails.message', $data, function($message) use ($request)
            {
                //remitente
                $message->from($request->email, $request->name);

                //asunto
                $message->subject($request->asunto);

                //receptor
                $message->to(env('CONTACT_MAIL'), env('CONTACT_NAME'));

            });
            return \View::make('front.success');
        }

    }
}