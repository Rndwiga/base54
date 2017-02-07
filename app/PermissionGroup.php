<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionGroup extends Model
{
    public $guarded = ['id'];

    public function permissions(){
        return $this->hasMany('Spatie\Permission\Models\Permission', 'group_id');
    }
}
