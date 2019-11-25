<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlumnosModel extends Model
{
    protected $table = "alumno";
    protected $primaryKey="matricula";
    public $incrementing=false;
}
