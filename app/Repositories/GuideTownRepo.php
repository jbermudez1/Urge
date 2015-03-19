<?php
/**
 * Created by PhpStorm.
 * User: YOEL
 * Date: 17/03/15
 * Time: 0:11
 */

namespace App\Repositories;


use App\Models\GuideProcedure;
use App\Models\GuideTown;
use App\Repositories\Base\BaseRepo;

class GuideTownRepo extends BaseRepo {

    public function getModel()
    {
        return new GuideTown();
    }

    public function findByIdWithRelations($id)
    {
        return $this->getModel()
            ->with($this->relations)
            ->where('id',$id)
            ->first();
    }

    public function getGuides($idtown, $idcategoryguide)
    {
        return $this->getModel()
                    ->join('towns','guidetowns.id_town','=','towns.id')
                    ->join('guides','guidetowns.id_guide','=','guides.id')
                    ->join('categoryguides','guides.id_category_guide','=','categoryguides.id')
                    ->where('categoryguides.id','=',$idcategoryguide)
                    ->where('guidetowns.id_town','=',$idtown)
                    ->select(   'guides.description AS guide',
                                'towns.description AS town',
                                'categoryguides.description AS category',
                                'guidetowns.id')
                    ->get();
    }


}