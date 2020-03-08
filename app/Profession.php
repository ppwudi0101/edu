<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    //专业表
    protected $table='profession';
    protected $fillable=['profession_name','profession_desc'];
}
