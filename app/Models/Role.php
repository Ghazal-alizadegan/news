<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    public function permissions()
    {
        return $this->belongsToMany(permission::class);
    }

    /**
     * @param permission $permission
     * @return bool
     */
    public function hasPermission (permission $permission)
    {
       return $this->permissions()->where('permission_id',$permission->id)->exists();
    }
    use HasFactory;
    protected $guarded=[];
}
