<invoice>

 
 
 <div class="container">
 <div class="card" style="width: 100%;">
 <div class="card-body ">
 <center><h3><i class="fas fa-fw fa-handshake "></i> Datos Personales Del Cliente. <br><br></h3></center>
 <div class="row">
 <div class="col-sm-3" style="margin-top: 20px" >  
 <input class="form-control" id="client" type="text" onkeypress="return soloNueros(event)" required placeholder="Numero de documento" style="border:none;border-bottom: 1px solid #000;border-radius: 0px;">   
  </div>
<div class="col-sm-9" style="margin-top: 20px" >  
    <input class="form-control" value="Nombres: {name} {nametwo} Apellidos: {apellido} {apellidotwo} Dirección: {address}" style="border:none;border-bottom: 1px solid #000;border-radius: 0px;width: 100%; background-color: #fff" readonly="">   
  </div>


  

  

 <!--  <div class="col-xs-4">  
  <h5>Numero Documento: {docuento} {ruc}.</h5>
  </div>

   <div class="col-xs-4">  
  <h5>.</h5>
  </div>
  -->

  

  

  <!-- <div class="col-xs-4" style="margin-left:2%">
 <h5>Nombre {name}, Apellido {apellido}, Nuero de  Documento {docuento} {ruc}.</h5>
  </div>
 -->
   <!-- <div class="col-sm-6">
  <h3>{name} {apellido} {docuento} {ruc}</h3>
  </div> -->


</div>
</div>
</div>
</div>
</div>
</div>





    














    <div class="row">
        <div class="col-xs-7">
            <input id="product" class="form-control" type="text" placeholder="Nombre del producto" />
        </div>
        <div class="col-xs-2">
            <input id="quantity" class="form-control" type="text" placeholder="Cantidad" />
        </div>
        <div class="col-xs-2">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">S/.</span>
                <input class="form-control" type="text" placeholder="Precio" value="{price}" readonly />
            </div>
        </div>
        <div class="col-xs-1">
            <button onclick={__addProductToDetail} class="btn btn-primary form-control" id="btn-agregar">
                <i class="glyphicon glyphicon-plus"></i>
            </button>
        </div>
    </div>

    <hr />

    <table class="table table-striped">
        <thead>
        <tr>
            <th style="width:40px;"></th>
            <th>Producto</th>
            <th style="width:100px;">Cantidad</th>
            <th style="width:100px;">P.U</th>
            <th style="width:100px;">Total</th>
        </tr>
        </thead>
        <tbody>
        <tr each={detail}>
            <td>
                <button onclick={__removeProductFromDetail} class="btn btn-danger btn-xs btn-block">X</button>
            </td>
            <td>{name}</td>
            <td class="text-right">{quantity}</td>
            <td class="text-right">$ {price}</td>
            <td class="text-right">$ {total}</td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="4" class="text-right"><b>IVA</b></td>
            <td class="text-right">$ {iva.toFixed(2)}</td>
        </tr>
        <tr>
            <td colspan="4" class="text-right"><b>Sub Total</b></td>
            <td class="text-right">$ {subTotal.toFixed(2)}</td>
        </tr>
        <tr>
            <td colspan="4" class="text-right"><b>Total</b></td>
            <td class="text-right">$ {total.toFixed(2)}</td>
        </tr>
        </tfoot>
    </table>

    <button if={detail.length > 0 && client_id > 0} onclick={__save} class="btn btn-default btn-lg btn-block">
        Guardar
    </button>

    <script>
        var self = this;

        // Detalle del comprobante 
        self.client_id = 0;
        self.detail = [];
        self.iva = 0;
        self.subTotal = 0;
        self.total = 0;

        self.on('mount', function(){
            __clientAutocomplete();
            __productAutocomplete();
        })

        __removeProductFromDetail(e) {
            var item = e.item,
                index = this.detail.indexOf(item);

            this.detail.splice(index, 1);
            __calculate();
        }

        __addProductToDetail() {
            self.detail.push({
                id: self.product_id,
                name: self.product.value,
                quantity: parseFloat(self.quantity.value),
                price: parseFloat(self.price),
                total: parseFloat(self.price * self.quantity.value)
            });

            self.product_id = 0;
            self.product.value = '';
            self.quantity.value = '';
            self.price = '';

            __calculate();
        }

        __save() {
            $.post(baseUrl('invoice/save'), {
                client_id: self.client_id,
                iva: self.iva,
                subTotal: self.subTotal,
                total: self.total,
                detail: self.detail
            }, function(r){
                if(r.response) {
                    window.location.href = baseUrl('invoice');
                } else {
                    alert('Ocurrio un error');
                }
            }, 'json')
        }

        function __calculate() {
            var total = 0;

            self.detail.forEach(function(e){
                total += e.total;
            });

            self.total = total;
            self.subTotal = parseFloat(total / 1.18);
            self.iva = parseFloat(total - self.subTotal);
        }

        function __clientAutocomplete(){
            var client = $("#client"),
                options = {
                url: function(q) {
                    return baseUrl('invoice/findClient?q=' + q);
                },
                getValue: 'ruc',
                list: {
                    onClickEvent: function() {
                        var e = client.getSelectedItemData();
                        self.client_id = e.id;
                        self.name = e.name;
                        self.nametwo = e.nametwo;
                        self.ruc = e.ruc;
                        self.apellido = e.apellido;
                        self.apellidotwo = e.apellidotwo;
                        self.docuento = e.docuento;
                        self.address = e.address;

                        self.update();
                    }
                }
            };

            client.easyAutocomplete(options);
        }

        function __productAutocomplete(){
            var product = $("#product"),
                options = {
                url: function(q) {
                    return baseUrl('invoice/findProduct?q=' + q);
                },
                getValue: 'name',
                list: {
                    onClickEvent: function() {
                        var e = product.getSelectedItemData();
                        self.product_id = e.id;
                        self.price = e.price;

                        self.update();
                    }
                }
            };

            product.easyAutocomplete(options);
        }
    </script>
</invoice>