@extends('layouts.admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Nueva Misa</h1>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<!---->
<section class="content">

        <div class="grid-hor">
            {!!Form::open(['route'=>'misa.store','method'=>'POST','class'=>'col-sm-10'])!!}

                <div class="form-group row">
                    <div class="col-sm-2"> 
                        {!!Form::label('descripcion','Descripcion:')!!}
                    </div>
                    <div class="col-sm-10">
                        {!!Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Ingrese la descripcion','id'=>'descripcion'])!!}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2"> 
                        {!!Form::label('fecha','Fecha:')!!}
                    </div>
                    <div class="col-sm-10"> 
                        {!!Form::text('fecha',null,['class'=>'form-control','placeholder'=>'Ingrese la descripcion','id'=>'fecha'])!!}
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

                {!!Form::submit('Agregar',['class'=>'btn btn-info'])!!}
                <a class="btn btn-danger" href="{{ route('misa.index') }}">Cancelar</a>

            {!!Form::close()!!}
        </div>

</section>

@endsection

@section('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>  
$(function(){

    $("a").click(function(){
			var id     = $(this).attr("id");
			var nombre = getCancion(id);
			var fila   = "";
			$.ajax({
				type:"POST",
				url:"cancionero/listar_canciones.php",
				data:"{}",
				contentType:"application/json",
				dataType:"json",
				success:function(resultado){
					option = "";
					$.each(resultado,function(index,value){
						option+= "<option value='"+value.idcancion+"'>"+value.titulo+"</option>";
					});
					selector  = "<select class='form-control form-control-sm' name='"+nombre+"'>"+option+"</select>";
					cajatexto = "<input type='text' name='txt"+nombre+"' class='form-control form-control-sm clasecaja'>";					
					//Construimos cada fila
					fila += "<div class='col-sm-7'>"+selector+"</div>";
					fila += "<div class='col-sm-4'>"+cajatexto+"</div>";
					$( ".col-sm-10:eq("+id+")" ).append(fila);			
				},
				error:function(){
					alert('Se producjo un error');
				}
			});
			
		    $(".clasecaja").on("keypress",function(e) {
				alert("hola");
			});	
			
			$(".btn-primary").click(function(){
				$("#frmMisa").submit();
			});		
		});

		function getCancion(pos){
			switch(pos){
				case '1':
					nombre = "entrada[]";break;
				case '2':
					nombre = "perdon[]";break;
				case '3':
					nombre = "gloria[]";break;
				case '4':
					nombre = "aleluya[]";break;
				case '5':
					nombre = "ofertorio[]";break;
				case '6':
					nombre = "santo[]";break;
				case '7':
					nombre = "padre[]";break;	
				case '8':
					nombre = "paz[]";break;	
				case '9':
					nombre = "cordero[]";break;	
				case '10':
					nombre = "comunion[]";break;	
				case '11':
					nombre = "salida[]";break;																																																		
				default:
					nombre = "cancion[]";break;
			}
			return nombre;
		}	

});
</script>
@endsection