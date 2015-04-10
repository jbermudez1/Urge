<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 10/04/15
 * Time: 1:12
 */

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\GuideRepo;
use App\Repositories\GuideTownRepo;

class GuidelinesController extends Controller {

    protected $guideRepo;
    protected $guideTownRepo;

    public function __construct(GuideRepo $guideRepo, GuideTownRepo $guideTownRepo)
    {
        $this->guideRepo = $guideRepo;
        $this->guideTownRepo = $guideTownRepo;
    }

    public function getList()
    {
        $data = $this->guideTownRepo->getAll();

        return view('admin._guidelines.list',compact('data'));
    }

    public function getDetail($id)
    {
        $data = $this->guideTownRepo->findByIdWithRelations($id);

        return view('admin._guidelines.detail',compact('data'));
    }

}