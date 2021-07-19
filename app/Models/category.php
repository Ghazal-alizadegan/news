<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function posts ()
    {
        return $this->hasMany(post::class);
    }
    use HasFactory;
    protected $guarded=[];
    public function getRouteKeyName()
    {
        return 'title';
    }
}
