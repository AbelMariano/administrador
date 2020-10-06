<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    public function Product()
    {
        return $this->hasMany("App\ProductoVendido", "id_venta");
    }

    public function clients()
    {
        return $this->belongsTo("App\clients", "id_cliente");
    }
}



 