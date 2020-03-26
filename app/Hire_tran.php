<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hire_tran extends Model
{
    protected $table="hire_trans";

    protected $fillable = ["title" ,"hire_id" ,"status" , "locale" , "content"];
}
