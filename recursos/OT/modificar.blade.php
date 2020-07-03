@extends('layout')
  
@section('areadetrabajo')

<div style="width:100%;color: white;">
    <div  style="width: 900px; margin-left: 40px; background-color: #152850; position: relative; display: flex; flex-direction: column; min-width: 0; word-wrap: break-word; background-clip: border-box; border: 1px solid rgba(0, 0, 0, 0.125); border-radius: 0.25rem;">
        <form action="{{ route('OT_Add') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" id="idclient" name="idclient" value="">
            <table class="table" style="color:white; width:97%; margin:10px;">
                <tr>
                    <td style="width:30%;">Fecha<br><input class="form-control txtbox" type="text" placeholder="Fecha de inicio" style="width: 160px;" value="{{ substr($data[0]->OT_date,8,2).'-'.substr($data[0]->OT_date,5,2).'-'.substr($data[0]->OT_date,0,4)}}" disabled>
                    <td>Cliente<br>
                    <input class="form-control txtbox" type="text" placeholder="Fecha de inicio" style="width: 160px;" value="{{ $data[0]->client_name }}" disabled>
                </td>
                <td>
                    <img style="border-radius: 5%;" src="{{ $data[0]->OT_file?'/images/'.$data[0]->OT_file:'/assets/profiles/sinimagen.png' }}" width="100px;" height="100px;">
                </td>
                </tr>
            </table>
            <table style="width:97%; margin:10px; color:white;">
                <tr>
                    <td style="width:80%;" >Detalle de Trabajo</td><td></td>
                </tr>
                <tr>
                    <td><textarea name="OT_detail" id="OT_detail" style="resize: both;height: 60px;width: 100%;">{{ $data[0]->OT_detail }}</textarea></td>
                    <td style="text-align: right;">
                        <a href="{{ route('ot_edit_detail',$data[0]->ots_id) }}" class="btn btn-primary">Agregar Detalles</a>
                    </td>
                </tr>
            </table>
            <table  style="border: 1px solid black; color:white; width:97%; margin:10px;padding:5px;"  >
                <tr>
                    <td colspan="3" style="text-align: center;">Elementos a utilizar</td>
                    <td></td>
                    <td></td>
                    <td colspan="3" style="text-align: right;">
                    <input type="submit" class="btn btn-warning" style="color: black;" value="Agregar Elemento"></td>
                </tr>
                <tr style="text-align: center;">
                    <td>Elemento</td><td>Cantidad</td><td>Ancho</td><td>Alto</td><td>Precio M2</td><td>M2</td><td>Total</td><td>Opción</td>
                </tr>
                <tr style="vertical-align: top;">
                    <td>
                        <select id="products_list" name="products_list" class="form-control" style="width:175px;">
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
                <?php $total = 0; $cont = 0; ?>
                    @foreach( $data as $relac )
                        <tr>
                            <td>{{ $relac->product_description }}</td>
                            <td style="text-align:right">{{ number_format($relac->Rel_quantity,2,',','.') }}</td>
                            <td style="text-align:right">{{ number_format($relac->Rel_width,2,',','.') }}</td>
                            <td style="text-align:right">{{ number_format($relac->Rel_height,2,',','.') }}</td>
                            <td style="text-align:right">{{ number_format($relac->Rel_price,2,',','.') }}</td>
                            <td style="text-align:right">{{ number_format($relac->Rel_width * $relac->Rel_height,2,',','.') }}</td>
                            <td style="text-align:right">{{ number_format($relac->Rel_quantity * $relac->Rel_price * $relac->Rel_width * $relac->Rel_height,2,',','.') }}</td>
                            <td style="text-align:center"><a href="{{ url('OT_remove_item',$data[$cont]->id) }}">X</a></td>
                            <?php $cont=$cont+1; ?>
                            <?php $total = $total+$relac->Rel_quantity * $relac->Rel_price * $relac->Rel_width * $relac->Rel_height; ?>
                        </tr>
                    @endforeach
                </tr>
                <tr>
                    <td colspan=5></td>
                    <td>Total</td>
                    <td style="text-align:right">{{ number_format($total,2,',','.') }}</td>
                </tr>
            </table>
        </form>

        <div class="row" style="margin-left: 10px;">
            <div style="margin-left:10px">
                Estado Actual 
                <input class="form-control txtbox" type="text" style="width:170px" value="{{ $data[0]->state_description }}" disabled>
            </div>        
            <div>
                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-top: 24px;margin-left: 10px;">
                Cambiar de Estado
                </button>
            </div>
        </div>
        <a href="{{ route('otra','1')}}" class="btn btn-info Back">Volver</a>
    </div>
</div>
<!--</form>-->

   <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cambio de Estado</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                Seguro que quiere camibiar de estado
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
            @foreach($data as $da )
                <a href="{{ url('OT_change_state',$da->ots_id) }}">
            @endforeach
                    <button type="button" class="btn btn-success" >Aplicar</button>
                </a>
                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            </div>

        </div>
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

</script>

    
@endsection