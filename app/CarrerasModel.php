<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarrerasModel extends Model
{
    protected $table = "carreras";
    protected $primaryKey="id";
    public $incrementing=true;
}
