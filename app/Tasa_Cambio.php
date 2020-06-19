<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasa_Cambio extends Model
{
    protected $table = "tasac";

    protected $fillable = ["monto","estado"];
}
