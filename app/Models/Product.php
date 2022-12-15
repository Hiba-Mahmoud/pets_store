<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use Translatable;
    use SoftDeletes;


    protected $with = ['translations'];
    protected $fillable = ['is_active','animal_id','user_id','brand_id','category_id','price','amount','color'];
    protected $casts = ['is_active'=>'boolean'];
    public $translatedAttributes = ['name','description'];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }


    public function animal(){
        return $this->belongsTo('App\Models\Animal');
    }


    public function brand(){
        return $this->belongsTo('App\Models\Brand');
    }


    public function category(){
        return $this->belongsTo('App\Models\Category');
    }


}
