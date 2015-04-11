<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 10/04/15
 * Time: 1:12
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\GuideRepo;
use App\Repositories\GuideTownRepo;
use App\Repositories\TownRepo;
use App\Repositories\ProcedureRepo;
use App\Repositories\GuideTown_ProcedureRepo;
use Illuminate\Http\Request;

class GuidelinesController extends Controller {

    protected $guideRepo;
    protected $guideTownRepo;
    protected $townRepo;
    protected $procedureRepo;
    protected $guideTownProcedureRepo;

    public function __construct(GuideRepo $guideRepo, GuideTownRepo $guideTownRepo, TownRepo $townRepo, ProcedureRepo $procedureRepo,GuideTown_ProcedureRepo $guideTown_ProcedureRepo)
    {
        $this->guideRepo = $guideRepo;
        $this->guideTownRepo = $guideTownRepo;
        $this->townRepo = $townRepo;
        $this->procedureRepo = $procedureRepo;
        $this->guideTownProcedureRepo = $guideTown_ProcedureRepo;
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

    public function getCreate()
    {
        $towns = $this->townRepo->lists();
        $guides = $this->guideRepo->lists();
        $procedures = $this->procedureRepo->getAll();

        return view('admin._guidelines.create',compact('towns','guides','procedures'));
    }

    public function postCreate(Request $request){
        $guidetown_data = $request->only('id_guide','id_town','description');

        $procedures_data = $request->get('procedures');

        try
        {
            \DB::beginTransaction();

            $guidetown = $this->guideTownRepo->create($guidetown_data);

            foreach ($procedures_data as $procedure) {
                $this->guideTownProcedureRepo->create([
                    'id_guide_town' => $guidetown->id,
                    'id_procedure' => $procedure['id_procedure'],
                    'is_enabled' => ($procedure['is_enabled'] == "true") ? true : false,
                    'url' => $procedure['url']
                ]);
            }

            \DB::commit();

            return [
                'success' => true,
                'message' => 'Lineamiento creado exitosamente'
            ];
        }
        catch(\Exception $e)
        {
            \DB::rollback();

            return [
                'ex' => $e->getMessage(),
                'success' => false,
                'message' => 'Ocurrio un error al intentar crear el lineamiento'
            ];
        }
    }

    public function getEdit($id)
    {
        $data = $this->guideTownRepo->findByIdWithRelations($id);
        $towns = $this->townRepo->lists();
        $guides = $this->guideRepo->lists();

        $except = array_map(function($value) {
            return $value["id_procedure"];
        }, $data->procedures->toArray());

        $procedures_new = $this->procedureRepo->getExcept($except);

        return view('admin._guidelines.edit', compact('data', 'towns', 'guides', 'procedures_new'));
    }

    public function postEdit($id, Request $request)
    {
        $guidetown = $this->guideTownRepo->findOrFail($id);
        $guidetown_data = $request->only('description');

        $procedures_data = $request->get('procedures');

        try
        {
            \DB::beginTransaction();

            $guidetown = $this->guideTownRepo->update($guidetown, $guidetown_data);

            foreach ($procedures_data as $procedure) {
                if((int) $procedure['id_detail'] > 0)
                {
                    $guidetown_procedure = $this->guideTownProcedureRepo->findOrFail($procedure['id_detail']);
                    $this->guideTownProcedureRepo->update($guidetown_procedure, [
                        'is_enabled' => ($procedure['is_enabled'] == "true") ? true : false,
                        'url' => $procedure['url']
                    ]);
                }
                else
                {
                    $this->guideTownProcedureRepo->create([
                        'id_guide_town' => $guidetown->id,
                        'id_procedure' => $procedure['id_procedure'],
                        'is_enabled' => ($procedure['is_enabled'] == "true") ? true : false,
                        'url' => $procedure['url']
                    ]);
                }
            }

            \DB::commit();

            return [
                'success' => true,
                'message' => 'Lineamiento actualizado exitosamente'
            ];
        }
        catch(\Exception $e)
        {
            \DB::rollback();

            return [
                'ex' => $e->getMessage(),
                'success' => false,
                'message' => 'Ocurrio un error al intentar actualizar el lineamiento'
            ];
        }
    }

    public function getGuides($id) {
        $data = $this->guideTownRepo->getByField('id_town',$id,'=',['id_guide']);
        return compact('data');
    }
}