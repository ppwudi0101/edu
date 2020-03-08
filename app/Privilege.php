<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    //权限模型
    protected $table="privilege";
    public $timestamps=false;
    protected $fillable=['priv_name','parent_id','controller_name','action_name','address','level_name'];
}
