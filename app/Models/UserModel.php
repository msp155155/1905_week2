<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'user';
    public $primaryKey ="id";
    public $timestamps = false;
//    protected $fillable=['name','pwd'];
    public $guarded = [];
}
