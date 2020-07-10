@extends('layout')
  
@section('areadetrabajo')

    <div style="width:100%;color: white;">
        <div  style="width: 800px; margin-left: 40px; background-color: #152850; position: relative; display: flex; flex-direction: column; min-width: 0; word-wrap: break-word; background-clip: border-box; border: 1px solid rgba(0, 0, 0, 0.125); border-radius: 0.25rem;">
            <form action="{{ route('OT_Add') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" id="idclient" name="idclient" value="">
                <table class="table" style="color:white;">
                    <tr><td>Fecha<br><input class="form-control txtbox" type="date" placeholder="Fecha de inicio" name="OT_date" id="OT_date" style="width: 160px;"></td>
                    <td>Cliente<br>
                        <select id="OT_client" name="OT_client" class="form-control" style="width: 300px;"> 
                            <option selected value=""></option>
                            @foreach( $clients as $client )
                                <option value="{{ $client->id }}">{{ $client->client_name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <a href="{{ route('clients.createHeredado','1') }}">
                            <button type="button" class="btn btn-default btn-lg" style="background-color:yellow;margin-top: 19px;">
                                <spam class="fa fa-arrow-right" style="font-size:20px;color:lightblue;text-shadow:2px 2px 4px #000000;"></spam>                        
                                Agregar Cliente                        
                            </button>
                        </a>
                    </td>
                    </tr>
                </table>
                <table style="width:100%; margin:10px; color:white;">
                    <tr>
                        <td>
                            Detalle de Trabajo<br>
                            <textarea name="OT_detail" id="OT_detail" style="resize: both;height: 60px;width: 97%;">Detalles de OT</textarea>
                        </td>
                    </tr>
                </table>
            
                <table  style="border: 1px solid black; color:white; width:97%; margin:10px;padding:5px;"  >
                    <tr>
                        <td colspan="3" style="text-align: center;">Elementos a utilizar</td>
                        <td></td>
                        <td></td>
                        <td colspan="2" style="text-align: right;">
                        <input type="submit" class="btn btn-warning" style="color: black;" value="Agregar Elemento"></td>
                    </tr>
                    <tr style="text-align: center;">
                        <td>Elemento</td><td>Cantidad</td><td>Ancho</td><td>Alto</td><td>Precio M2</td><td>M2</td><td>Total</td>
                    </tr>
                    <tr style="vertical-align: top;">
                        <td><select id="products_list" name="products_list" class="form-control" style="width:175px;">
                                <option value="" selected></option>
                                @foreach( $products as $product )
                                    <option value="{{ str_pad($product->id, 6, '0', STR_PAD_LEFT) }}{{$product->product_price}}">{{ $product->product_description }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input class="form-control txtbox" type="text" placeholder="Cantidad" name="Detail_quantity" id="Detail_quantity" style="width:100px" onkeyup="CalcularTotal();"></td>
                        <td><input class="form-control txtbox" type="text" placeholder="Ancho" name="Detail_width" id="Detail_width" style="width:100px" onkeyup="CalcularTotal();"></td>
                        <td><input class="form-control txtbox" type="text" placeholder="Alto" name="Detail_height" id="Detail_height" style="width:100px" onkeyup="CalcularTotal();"></td>
                        <td><input class="form-control txtbox" type="text" placeholder="PrecioM2" name="Detail_price" id="Detail_price" style="width:100px"></td>

                        <td><input class="form-control txtbox" type="text" placeholder="Metros2" name="m2" id="m2" style="width:100px" disabled></td>
                        <td><input class="form-control txtbox" type="text" placeholder="Total" name="Detail_total" id="Detail_total" style="width:100px" disabled ></td>
                        <td></td>
                    </tr>
                    <tr>
                        <?php $total = 0;?>
                        <tr>
                            <td colspan=5></td>
                            <td>Total</td>
                            <td>{{ $total }}</td>
                        </tr>
                    </tr>
                </table>
            </form>
        <a href="{{ route('otra','1')}}" class="btn btn-info Back">Volver</a>
    </div>

<script type="text/javascript">
    $("#products_list").on("change", function() {
        var idprecio;
        var precio;
        idprecio = document.getElementById('products_list').value;
        precio = idprecio.slice(6);
        console.log(precio);
        document.getElementById('Detail_price').value = precio;  
    });

    $("#OT_client").on("change", function() {
        var idclient;
        idclient = document.getElementById('OT_client').value;
        document.getElementById('idclient').value = idclient;  
    });


</script>

    
@endsection