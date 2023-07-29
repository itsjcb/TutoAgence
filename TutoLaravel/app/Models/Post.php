<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
//those authorized
    protected $fillable = [
        'title', 
        'slug',
        'content'
    ];
//contrary of fillable those unauthorized
    //protected $guarded =[]
}
