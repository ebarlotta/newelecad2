@extends('layout')
  
@section('areadetrabajo')
 
        <div class="column">
            <p class="btn-holder" style="margin-bottom: 0rem;">
                <a href="{{ route('products.create') }}" class="btn btn-info Add" role="button">
                    Agregar Producto
                </a>
            </p>
            <div>
                <table class="table-holder table-responsive table-dark table-striped">
                    <thead style="text-align:center">
                        <th style="text-align:center">Descripción</th>
                        <th style="text-align:center">Precio m2</th>
                        <th style="text-align:center">Unidad</th>
                        <th style="text-align:center">Lista</th>
                        <th style="text-align:center">Opciones</th>
                    </thead>
                    <tbody>
                        
                        @foreach($products as $product)
                        <tr>
                            <td> {{ $product->product_description }}</td>
                            <td style="text-align:right"> $ {{ number_format($product->product_price, 2, ',', '.') }}</td>
                            <td> {{ $product->unity_description }}</td>
                            <td> {{ $product->list_name }}</td>
                            <td>
                                <a href="{{ route('products.edit',$product->id) }}" class="btn btn-success">
                                    <i class="fa fa-refresh"></i>
                                </a>
                                <a href="{{ route('products.destroy', $product->id) }}" class="btn btn-danger">
                                    <i class="fa fa-remove"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <a href="{{ route('otra','1')}}" class="btn btn-info Back">Volver</a>
        </div><!-- End row -->
    </div>

@endsection