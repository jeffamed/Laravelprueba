<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = "facturas";

    protected $fillable = ["idCliente","idTasa","total","tipoFactura","estado"];
}
