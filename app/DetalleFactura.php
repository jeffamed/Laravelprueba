<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{
    protected $table = "detallefactura";

    protected $fillable = ['idFactura','idProducto','cantidad','precio'];
}
