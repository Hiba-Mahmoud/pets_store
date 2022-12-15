<?php

namespace App\Http\Controllers\Api;
use App\Models\Brand;
use App\Models\Animal;
use App\Models\Category;
use App\Models\AnimalType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Translatable;

class GeneralController extends Controller
{

    public function categories (Request $request){

        $post = Category::where(function($query)use($request){
            if($request->has('locale')){
                App::setLocale($request->locale);
                $query->with('translations')->where('is_active',1);
            }
            })->get();
        return apiResponse('true','success',$post);
    }




    public function brands (Request $request){

        $brands = Brand::where(function($query)use($request){
            if($request->has('locale')){
                App::setLocale($request->locale);
                $query->with('translations')->where('is_active',1);
            }
            })->get();
        return apiResponse('true','success',$brands);
    }



    public function animals(Request $request){
        $animals = Animal::where(function($query)use($request){
            if($request->has('locale')){
                App::setLocale($request->locale);
                $query->with('translations')->where('is_active',1);
            }
            })->get();
        // $animals =  Animal::where('is_active',1)->get();
        return apiResponse('true','success',$animals);
    }


    public function animalType(Request $request){
        $animaltype = AnimalType::where(function($query)use($request){
            if($request->has('locale')){
                App::setLocale($request->locale);
                $query->with('translations')->where('is_active',1);
            }
            })->get();
        // $animaltype =  AnimalType::where('is_active',1)->get();
        return apiResponse('true','success',$animaltype);
    }
}
