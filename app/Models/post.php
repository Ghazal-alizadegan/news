<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $fillable=['title','slug','body','category_id'];
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
