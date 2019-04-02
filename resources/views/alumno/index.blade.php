@extends('vdg.layout')
@section('style')
<link rel="stylesheet" type="text/css"
href="admin/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css"
href="admin/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
@endsection
@section('content')

<!-- Page-header start -->
<div class="page-header card">
  <div class="row align-items-end">
      <div class="col-lg-8">
          <div class="page-header-title">
              <i class="icofont icofont-table bg-c-blue"></i>
              <div class="d-inline">
                  <h4>Mostrar Registros</h4>
                  <span>TIKS y Capacitaciones</span>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- Page-header end -->

  <div class="card">
    <div class="card-header">
        <h5>Registros de los alumnos</h5>
        <span></span>
        <div class="card-header-right"><i
                class="icofont icofont-spinner-alt-5"></i></div>
    </div>
    <div class="card-block">
      <div class="dt-responsive table-responsive">
        <table id="tabla_alumnos" class="table table-striped table-bordered nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>Matricula</th>
              <th>Nombre</th>
              <th>Edad</th>
              <th>&nbsp;</th>
            </tr>
          </thead>

          <tfoot>
              <tr>
                <th>ID</th>
                <th>Matricula</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>&nbsp;</th>
              </tr>
            </tfoot>
        </table>
  
      </div>
    </div>
  </div>      

     
@section('script')
<!-- data-table js -->
<script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
     
      

      <script>
        $(document).ready(function() {
          $('#tabla_alumnos').DataTable({
            "serverSide": true, 
            "ajax": "{{url('api/alumno')}}",
            "columns": [
              {data: 'id'},
              {data: 'matricula'},
              {data: 'nombre'},
              {data: 'edad'},
              {data: 'btn'}
            ],
            'columnDefs': [
              {
                "targets": [0,1,2,3,4], // your case first column
                "className": "text-center",
                "width": "4%"
            }],

            "language": {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
              }
            }
          });
              
        });
      </script>
      @endsection
@endsection

