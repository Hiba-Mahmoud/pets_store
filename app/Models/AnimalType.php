<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnimalType extends Model
{
    use HasFactory;
    use Translatable;
    use SoftDeletes;


    protected $with = ['translations'];
    protected $fillable = ['is_active','animal_id'];
    protected $casts = ['is_active'=>'boolean'];
    public $translatedAttributes = ['name'];}
