<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\BrandTranslation;

class BrandsController extends Controller
{
    public function index()
    {
        return 'ddddddddddd';
    }
    public function create()
    {
        return view('admin.brands.create');
    }
    public function store(BrandRequest $request)
    {
        $brand = new Brand();
        if ($request->is_active == 'on') {

            $brand->is_active = true;
        } else {
            $brand->is_active = false;
        }
        $brand->save();

        $english = 'en';
        $brand->translateOrNew($english)->name = " $request->name_en";
        $brand->save();

        $locale = 'ar';
        $brand->translateOrNew($locale)->name = " $request->name_ar";
        $brand->save();

        return redirect('/admin')->with(['message'=>'brand addes succsessfully']);
    }
    public function edit()
    {
    }
    public function update()
    {
    }
    public function destroy()
    {
    }
}
