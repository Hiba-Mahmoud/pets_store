<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BrandsDataTable;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\BrandTranslation;
use Yajra\DataTables\DataTables;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;
use Collective\Html\HtmlBuilder;
// use Yajra\DataTables\Facades\DataTables;

class BrandsController extends Controller
{
    // use DataTables;



    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */
    public function index(BrandsDataTable $brand)

    {
       return $brand->render('admin.brands.index',['title'=>'DashBoars|Brands']);


    }

    // public function index(Request $request)

    // {

    //     if ($request->ajax()) {

    //         $data = BrandTranslation::select('*')->where('locale',app()->getLocale())->get();

    //         return Datatables::of($data)

    //             ->addIndexColumn()

    //             ->addColumn('action', function ($row) {

    //                 $btn = "<a href={{route('brands.edit',$row->brand_id)}} class='edit btn btn-primary btn-sm'>View</a>
    //                         <a href='javascript:void(0)' class='edit btn btn-primary btn-sm'>edit</a>
    //                         <a href='javascript:void(0)' class='edit btn btn-primary btn-sm'>delete</a>";
    //                 return $btn;
    //             })


    //             ->rawColumns(['action'])

    //             ->make(true);
    //     }



    //     return view('admin.brands.index');
    // }






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

        return redirect('/admin')->with(['message' => 'brand addes succsessfully']);
    }







    public function edit($id)
    {
        $brand = Brand::where('id',$id)->first();
        return view('admin.brands.edit',compact('brand'));
    }
    public function update()
    {
    }
    public function destroy()
    {
    }
}
