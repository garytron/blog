<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //protected $table = "";

    //Here only is permitted these columns.
    protected $fillable = ['nombre','email','mensaje'];
}
