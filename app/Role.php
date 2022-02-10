<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Role extends Model {
    protected $fillable = ['role'];

    function users() {
        return $this->hasMany(User::class);
    }
}
