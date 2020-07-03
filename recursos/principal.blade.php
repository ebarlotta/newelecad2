@extends('layout')
 
  @section('title', 'Products')
  
    @if(session('message'))
        @include('message')
    @endif

  @section('content')
                
    <div class="container" style="width:100%;">
      <div class="row">
        <div class="column" style="width:24%; padding-right: 5px;">
          <a href="{{ route('otra','1') }}" class="menu">
            <div class="notice notice-success menu align-self-center text-center">
              <strong>1 </strong>Diseños
            </div>
          </a>
          <a  href="{{ route('otra','2') }}" class="menu align-self-center text-center">
            <div class="notice notice-danger menu">
                <strong>2</strong> Impresiones Laser  
            </div>
          </a>
          <a href="{{ route('otra','3') }}" class="menu align-self-center text-center">
            <div class="notice notice-info menu">
                <strong>3</strong> Enviados a Imprimir
            </div>
          </a>
          <a  href="{{ route('otra','4') }}" class="menu align-self-center text-center">
            <div class="notice notice-warning menu">
              <strong>4</strong> Imprimiendo    
            </div>
          </a>
          <a href="{{ route('otra','5') }}" class="menu align-self-center text-center">
            <div class="notice notice-success menu">
              <strong>5</strong> Trabajo Impreso
            </div>
          </a>
          <a href="{{ route('otra','6') }}" class="menu align-self-center text-center">
            <div class="notice notice-danger menu">
              <strong>6</strong> Terminaciones
            </div>
          </a>
          <a href="{{ route('otra','7') }}" class="menu align-self-center text-center">
            <div class="notice notice-info menu">
              <strong>7</strong> Listo para entregar
            </div>
          </a>
          <a href="{{ route('otra','8') }}" class="menu align-self-center text-center">
            <div class="notice notice-warning menu">
              <strong>8</strong> Trabajos Retirados
            </div>
          </a>
          <a href="{{ route('otra','9') }}" >
            <div class="notice notice-success menu align-self-center text-center">
              <strong>9</strong> Trabajos a enviar
            </div>
          </a>
        </div>        
        <div style="width:75%;height:100%; background-color: red; background-image: linear-gradient( to right, red, #f06d06, rgb(255, 255, 0), green ); opacity: 0.9; border-top-left-radius: 10px; border-bottom-left-radius: 10px;" class="gradient">
          @foreach($clients1 as $client) 
          <a href="{{ route('OT.modificar',$client->ots_id) }}" style="text-decoration: none;">
            <div class="card-list">
              <div class="row" style="align-items:center; justify-content: space-around;display:flex;">
                @if($client->client_photo) 
                  <img src="/assets/profiles/{{ $client->client_photo }}" class="card-img-top" alt="..." style="width:50px;height:50px;">
                @else 
                  <img src="/assets/profiles/sinfoto.png" class="card-img-top" alt="..." style="width:50px;height:50px;">
                @endif
                <div>                
                  @if($client->OT_file) 
                    <img style="border-radius: 5%;" src="{{ '/images/'.$client->OT_file }}" width="60px;" height="60px;">
                  @else
                    <img src="/assets/profiles/sinimagen.png" class="card-img-top" alt="..." style="width:130px;height:60px;">
                  @endif
                </div>
                <div style="font-size:18px;">{{ $client->client_name }} - {{ $client->client_telephone }}</div>
              </div>
            </div>
          </a>
          @endforeach
        </div>        
      </div>
    </div>

   <!-- The Modal -->
    
  @endsection

  @section('menu')
    <div class="card">
      <div>
        <img src="/assets/profiles/kate-trysh-Dnkr_lmdKi8-unsplash.jpg" alt="" style="width:100%; height:100px" >
      </div>
      <h5 class="card-title">Ordenes de Trabajo</h5>
      <div class="card-body">
        <a href="{{ route('OT.index','0') }}" class="btn btn-primary">Órdenes de Trabajo</a>
      </div>
    </div>
    <div class="card">
      <div>
        <img src="/assets/profiles/clients.jpg" alt="" style="width:100%; height:100px" >
      </div>
      <h5 class="card-title">Clientes</h5>
      <div class="card-body">
        <a href="{{ route('clients.show_all') }}" class="btn btn-primary">Clientes</a>
      </div>
    </div>
    <div class="card">
      <div>
        <img src="/assets/profiles/products.jpg" alt="" style="width:100%; height:100px" >
      </div>
      <h5 class="card-title">Productos</h5>
      <div class="card-body">
        <a href="{{ route('products.show_all') }}" class="btn btn-primary">Productos</a>
      </div>
    </div>
    <div class="card">
      <div>
        <img src="/assets/profiles/pays.jpg" alt="" style="width:100%; height:100px" >
      </div>
      <h5 class="card-title">Formas de Pago</h5>
      <div class="card-body">
        <a href="{{ route('forms.show_all')}}" class="btn btn-primary">Formas de Pago</a>
      </div>
    </div>
    <div class="card">
      <div>
        <img src="/assets/profiles/pricelist.jpg" alt="" style="width:100%; height:100px" >
      </div>
      <h5 class="card-title">Listas de Precio</h5>
      <div class="card-body">
        <a href="{{ route('lists.show')}}" class="btn btn-primary">Listas de Precio</a>
      </div>
    </div>
  @endsection