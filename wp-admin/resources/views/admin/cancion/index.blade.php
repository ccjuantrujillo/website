@extends('layouts.admin')

@section('content')

<section class="content-header"> 
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h1>Listado de canciones</h1>
      </div>
      <div class="col-sm-6 text-right">
        <a class="btn btn-info" href="{{ route('categoria.create') }}">Agregar Cancion</a>
      </div>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-body">

           <table class="table table-bordered table-hover" id="tblCancion">
              <thead>
                <tr>
                  <th scope="col">Codigo</th>
                  <th scope="col">Nombre</th>
                  <th scope="col" colspan="2" class="text-center">Acciones</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>

        </div>

      </div>
    </div>
  </div>
</section>

<!--grid-->
<div class="grid-system">
    <!---->
    <div class="horz-grid">

        <!----> 
        <div class="grid-hor">
 
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>  
$(function(){

	$("#tblCancion").DataTable({
		    processing: true,
        serverSide: true,
        ajax: "{{ url('/dataTableCancion') }}",
        language: {
          lengthMenu: "_MENU_",
          search: "_INPUT_",
          searchPlaceholder: "Search"
        },

	});

});
</script>
@endsection