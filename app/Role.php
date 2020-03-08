<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //角色模型
    protected $table="role";
    public $timestamps=false;
    protected $fillable=['role_name','priv_ids','priv_ac'];
}
