<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Models\Brand;



use App\Models\Animal;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class ProductController extends Controller
{





    public function create()
    {
        $admins = User::all();
        $animals = Animal::all();
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.create',[
            'admins'=>$admins,
            'animals'=>$animals,
            'brands '=>$brands,
            'categories '=>$categories,
        ]);

    }




    public function store(Request $request)
    {
        // dd($request);
        $category = new Product();

        // helper function
        isActive($request->is_active,$category);
        $category->save();

        // $english = 'en';
        $category->translateOrNew('en')->name = " $request->name_en";
        $category->save();

        // $locale = 'ar';
        $category->translateOrNew('ar')->name = " $request->name_ar";
        $category->save();

        return redirect('/admin')->with(['message' => 'catogery addes succsessfully']);
    }

}
