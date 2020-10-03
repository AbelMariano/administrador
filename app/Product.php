<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    

protected $fillable=[
'name',
'cantidad',
'peso',
'unidad',
'price',
'iva'];



  
}
