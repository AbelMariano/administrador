<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clients extends Model {
  protected $fillable =[
   "name",
   "nametwo",
   "apellido",
   "apellidotwo",
   "docuento",
   "ruc",
   "address",
   "telefono",
   "correo"];
}
