@extends('layout')
  
@section('areadetrabajo')

<form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div style="display: block;width:100%">
        <div class="Card-Edit">
        <div class="card-body">
            <h5 class="card-title title-card">EDITAR PRODUCTOS</h5>
            <p class="card-text">
                Descripción
                <input class="form-control txtbox" type="text" placeholder="Descripcion" name="product_description" id="product_description" value="{{ $product->product_description }}">
                Precio m2
                <input class="form-control txtbox" type="text" placeholder="Precio" name="product_price" id="product_price" value="{{ $product->product_price }}">

                Unidad
                <select id="product_unity" name="product_unity" class="form-control">
                @foreach( $unitys as $unity )
                    <option value="{{ $unity->id }}" {{ $unity->id==$product->product_unity ? ' selected':'' }} >{{ $unity->unity_description }}</option>
                @endforeach
                </select>
                <!--<input class="txtbox" type="text" placeholder="Unidad" name="product_unity" id="product_unity">-->

                Lista de precio
                <select id="product_id_list" name="product_id_list" class="form-control">
                @foreach( $lists as $list )
                    <option value="{{ $list->id }}" {{ $list->id==$product->product_id_list ? ' selected':'' }} >{{ $list->list_name }}</option>
                @endforeach
                    <!--<input class="txtbox" type="text" placeholder="Lista1" name="product_id_list" id="product_id_list">-->
                </select>
            </p>
            <div class="modal-footer">
                <input type="submit" class="btn btn-warning" style="color: black;" value="Modificar">
                <a href="{{ route('products.show_all')}}" class="btn btn-info">Volver</a>
            </div>
        </div>
    </div>
</form>

@endsection