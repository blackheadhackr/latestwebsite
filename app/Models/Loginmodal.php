<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loginmodal extends Model
{
    protected $table = 'users';
    public $timestamps = false;

    // protected function casts():array{
        
    //     return [
    //         'password' => 'hashed',
    //     ];        
    // }
}
