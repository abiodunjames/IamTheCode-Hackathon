<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    protected $table="incidents";
    protected $fillable=['name','from','latitude','longitude','location','photo'];
}
