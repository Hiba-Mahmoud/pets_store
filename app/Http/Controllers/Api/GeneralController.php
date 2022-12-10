<?php

namespace App\Http\Controllers\Api;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\AnimalType;
use App\Models\Brand;

class GeneralController extends Controller
{

    public function categories (){
        $categories =  Category::where('is_active',1)->get();
        return apiResponse('true','success',$categories);
    }




    public function brands (){
        $brands =  Brand::where('is_active',1)->get();
        return apiResponse('true','success',$brands);
    }



    public function animals(){
        $animals =  Animal::where('is_active',1)->get();
        return apiResponse('true','success',$animals);
    }


    public function animalType(){
        $animaltype =  AnimalType::where('is_active',1)->get();
        return apiResponse('true','success',$animaltype);
    }
}
