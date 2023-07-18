<?php

namespace App\Domain\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{    
    protected $table = 'categories';
    
    protected $fillable = ['name'];
}