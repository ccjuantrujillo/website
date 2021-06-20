@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Editar Misa</h1>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<!---->
<section class="content">
    <div class="grid-hor">           
        {!!Form::model($misa, ['route'=>['misa.update', $misa->MISAP_Codigo],'method'=>'PATCH', 'class'=>'col-sm-10'])!!}

            <div class="form-group row">
                <div class="col-sm-2"> 
                    {!!Form::label('id','Codigo')!!}
                </div>
                <div class="col-sm-10"> 
                    {!!Form::text('id',$misa->MISAP_Codigo,['class'=>'form-control','placeholder'=>'Ingrese el codigo','id'=>'id','readonly'=>'readonly'])!!}
                </div>
            </div>  

            <div class="form-group row">
                <div class="col-sm-2"> 
                    {!!Form::label('descripcion','Descripcion')!!}
                </div>
                <div class="col-sm-10"> 
                    {!!Form::text('descripcion',$misa->MISAC_Descripcion,['class'=>'form-control','placeholder'=>'Ingrese los nombres','id'=>'descripcion'])!!}
                </div>
            </div>  

            <div class="form-group row">
                <div class="col-sm-2"> 
                    {!!Form::label('fecha','Fecha')!!}
                </div>
                <div class="col-sm-10"> 
                    {!!Form::text('fecha',$misa->MISAC_Fecha,['class'=>'form-control','placeholder'=>'Ingrese la fecha','id'=>'fecha'])!!}
                </div>
            </div> 

            <div><hr></div>

            <!--Detalle-->
            <div class="form-group row">
                <label class="col-sm-2">ENTRADA: <a href='#' id="1"><b><font color="#FF0000">(+)</font></b></a></label>
                <div class="col-sm-10 row"></div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">PERDON: <a href='#' id="2"><b><font color="#FF0000">(+)</font></b></a></label>
                <div class="col-sm-10 row"></div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">GLORIA: <a href='#' id="3"><b><font color="#FF0000">(+)</font></b></a></label>
                <div class="col-sm-10 row"></div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">ALELUYA: <a href='#' id="4"><b><font color="#FF0000">(+)</font></b></a></label>
                <div class="col-sm-10"></div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">OFERTORIO: <a href='#' id="5"><b><font color="#FF0000">(+)</font></b></a></label>
                <div class="col-sm-10"></div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">SANTO: <a href='#' id="6"><b><font color="#FF0000">(+)</font></b></a></label>
                <div class="col-sm-10"></div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">P.NUESTRO: <a href='#' id="7"><b><font color="#FF0000">(+)</font></b></a></label>
                <div class="col-sm-10"></div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">PAZ: <a href='#' id="8"><b><font color="#FF0000">(+)</font></b></a></label>
                <div class="col-sm-10"></div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">CORDERO: <a href='#' id="9"><b><font color="#FF0000">(+)</font></b></a></label>
                <div class="col-sm-10"></div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2">COMUNION: <a href='#' id="10"><b><font color="#FF0000">(+)</font></b></a></label>
                <div class="col-sm-10"></div>
            </div>	

            <div class="form-group row">
                <label class="col-sm-2">SALIDA: <a href='#' id="11"><b><font color="#FF0000">(+)</font></b></a></label>
                <div class="col-sm-10"></div>
            </div>
            <!--/Detalle-->


            {!!Form::submit('Editar',['class'=>'btn btn-info'])!!}
            <a class="btn btn-danger" href="{{ route('misa.index') }}">Cancelar</a>
        {!!Form::close()!!}

    </div>
</section>

@endsection