<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BrandTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    // public function brands(){
    //     return $this->belongsTo('App\Models\Brand');
    //    }
}
