@extends('vdg.layout')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="icofont icofont-pencil bg-c-yellow"></i>
                <div class="d-inline">
                    <h4>Perfil del alumno</h4>
                    <span>TIKS y Capacitaciones</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->

<!-- Basic Form Inputs card start -->
<div class="card">
    
  <div class="card-block">
    <h4 class="sub-title">Detalles sobre la informacion del alumno</h4>

    <div class="col-xs-12 col-sm-10 col-md-10">
      <div class="well well-sm">
        <div class="row">
          <div class="col-sm-6 col-md-4">
            <img src="../perfil/{{$alumno->foto}}" width="250" height="250"/>
          </div>
          <div class="col-sm-6 col-md-8">
            <h4>{{$alumno->nombre}}</h4>
            <p><i class="fa fa-rocket"></i><b>Matricula:</b>{{$alumno->matricula}}
            <br />
            <br>
            <i class="glyphicon glyphicon-globe"></i>Estudiante en {{$alumno->escuela}}
            <br />
            <br>
            <i class="glyphicon glyphicon-gift"></i>{{$alumno->edad}} años</p>
            <br>
            <button class="btn btn-danger" data-toggle="modal" data-target="#myModal">MODAL</button>
          </div>
        </div>
      </div>
    </div>
</div>  
   
      <!--MODAL-->
      

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Alumno</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>
@endsection