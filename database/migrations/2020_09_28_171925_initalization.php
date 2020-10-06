<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Initalization extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('nametwo');
            $table->string('apellido');
            $table->string('apellidotwo');
            $table->string('docuento');
            $table->string('ruc');
            $table->string('address');
            $table->string('telefono');
            $table->string('correo');
            $table->timestamps();
        });
 
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("codigo_barras");
            $table->string("descripcion");
            $table->decimal("precio_compra", 9, 2);
            $table->decimal("precio_venta", 9, 2);
            $table->decimal("existencia", 9, 2);
            $table->timestamps();
        });


       Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            });

        Schema::create('productos_vendidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_venta");
            $table->foreign("id_venta")->references("id")->on("ventas")->onDelete("cascade")->onUpdate("cascade");
            $table->string("descripcion");
            $table->string("codigo_barras");
            $table->decimal("precio", 9, 2);
            $table->decimal("cantidad", 9, 2);
            $table->timestamps();
        });

        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('iva', 10,2);
            $table->decimal('subTotal', 10,2);
            $table->decimal('total', 10,2);
            $table->timestamps();
        });

        Schema::create('invoice_items', function (Blueprint $table) {
            $table->decimal('quantity', 10,2);
            $table->decimal('unitPrice', 10,2);
            $table->decimal('total', 10,2);
            $table->timestamps();
        });

       
        // Foreign keys
        
        Schema::table('ventas', function ($table) {
            $table->integer('id_cliente')->unsigned();
            $table->foreign('id_cliente')->references('id')->on('clients');
        });

        // Schema::table('invoice_items', function ($table) {
        //     $table->integer('invoice_id')->unsigned();
        //     $table->integer('product_id')->unsigned();

        //     $table->foreign('invoice_id')->references('id')->on('invoices');
        //     $table->foreign('product_id')->references('id')->on('products');
        // });

        

        // Default data
        DB::table('clients')->insert([
            ['name' => 'Abel',
            'nametwo' => 'Mariano',
            'apellido' => 'Flores',
            'apellidotwo' => 'silva',
            'docuento' => 'DNI',
            'ruc' => '23951264',
            'address' => 'Av. Los informáticos 107',
            'telefono' => '04248331041',
            'correo' => 'abelmarianoo@gmail.com']
           
        ]);



        DB::table('products')->insert([
            [
            'codigo_barras'=> '12',
            'descripcion' => 'Helado de coco',
            'precio_compra' => 1000.50,
            'precio_venta' =>3000.20,
             'existencia'=> '12',
             ],
           [
            'codigo_barras'=> '15',
            'descripcion' => 'Helado de fresa',
            'precio_compra' => 2000.50,
            'precio_venta' =>2000.00,
             'existencia'=> '122',
           ]
        ]);
    }

    public function down()
    {

    }
}
