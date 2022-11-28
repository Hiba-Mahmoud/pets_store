<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
// use \Dimsav\Translatable\Translatable;

class Brand extends Model
{
    use HasFactory;
    use Translatable;
    use SoftDeletes;


    protected $with = ['translations'];
    protected $fillable = ['is_active'];
    protected $casts = ['is_active'=>'boolean'];
    // public $translateAttributes = ['name'];
    public $translatedAttributes = ['name'];


}
