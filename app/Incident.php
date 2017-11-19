<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    protected $table="incidents";
    protected $fillable=['name','fromIp','latitude','longitude','location','photo','email'];
}
