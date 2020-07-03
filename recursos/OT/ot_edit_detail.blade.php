@extends('layout')
  
@section('areadetrabajo')

    <div style="width:100%;color: white;">
        <div  style="width: 900px; margin-left: 40px; background-color: #152850; position: relative; display: flex; flex-direction: column; min-width: 0; word-wrap: break-word; background-clip: border-box; border: 1px solid rgba(0, 0, 0, 0.125); border-radius: 0.25rem;">
            <form action="{{ route('ot_update_detail1',$ots->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div style="text-align: center; margin: 10px;">
                    <textarea style="resize: both;width:100%;" name="OT_detail" id="OT_detail" style="resize: both;height: 60px;width: 97%;margin 10px">
                        {{ $ots->OT_detail }}
                    </textarea>
                </div>
                <div style="text-align: end; margin: 10px;">
                    <input type="file" name="OT_file" id="OT_file" class="btn" style="color: black;" value="Actualizar Detalle">
                </div>
                <div style="text-align: end; margin: 10px;">
                    <input type="submit" class="btn btn-warning" style="color: black;" value="Actualizar Detalle">
                </div>
            </form>
        </div>
    </div>
@endsection