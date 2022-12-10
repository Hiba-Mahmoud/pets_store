<?php

namespace App\Http\Controllers\Admin;

use App\Models\Animal;
use App\Models\AnimalType;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnimalTypeRequest;

class AnimalTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $animals= Animal::where('is_active',1)->get();
        return view('admin.animalType.create',['animals'=>$animals]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnimalTypeRequest $request)
    {

        $animalType = new AnimalType();

        // helper function
        isActive($request->is_active,$animalType);
        $animalType->animal_id = $request->animal_id ;

        $animalType->save();

        $english = 'en';
        $animalType->translateOrNew($english)->name = " $request->name_en";
        $animalType->save();

        $locale = 'ar';
        $animalType->translateOrNew($locale)->name = " $request->name_ar";
        $animalType->save();

        return redirect('/admin')->with(['message' => 'animalType addes succsessfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
