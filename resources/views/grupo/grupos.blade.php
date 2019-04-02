@extends('vdg.layout')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="icofont icofont-table bg-c-blue"></i>
                <div class="d-inline">
                    <h4>Grupo disponibles</h4>
                    <span>TIKS y Capacitaciones</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <button class="btn btn-danger" data-toggle="modal" data-target="#grupo_add">MODAL</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Page-header end -->

<!-- Basic Form Inputs card start -->
<div class="card">

<div class="card-block">
    <h4 class="sub-title">Grupos</h4>

    <div class="card">
            <div class="card-header">
                <h5>Grupos actuales</h5>
            </div>
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="border-bottom-danger">
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Fecha de inicio</th>
                                <th>Fecha de cierre</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($grupos as $grupo)
                            <tr class="border-bottom-primary">
                                <th>{{$grupo->id}}</th>
                                <th>{{$grupo->nombre_grupo}}</th>
                                <th>{{$grupo->f_inicio}}</th>
                                <th>{{$grupo->f_fin}}</th>
                                <th>
                                    <a href="{{route('grupo.show',$grupo->id)}}"class="btn btn-warning">Detalles</a> 
                                    <a href="{{route('grupo.destroy',$grupo->id)}}"class="btn form-txt-danger">Eliminar</a>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<!-- MODAL PARA AGREGAR ESCUELAS -->

<div class="modal fade" id="grupo_add" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Nuevo Grupo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <form action="/grupo" method="POST">
                    @csrf

                    <div class="form-group row">
                            <div class="col-sm-10">
                                <label for="nobre"><h5>Nombre del grupo</h5></label>
                                <input id="nombre" name="nombre_grupo" type="text" class="form-control"
                                        placeholder="nombre">
                            </div>
                        </div>
                        <br>
                        <h4 class="sub-title">Periodo</h4>
                        <div class="form-group row">
                                
                            <div class="col-sm-4">
                                <label for="inicio"><h5>Fecha inicio</h5></label>
                            </div>
                            <div class="col-sm-8">
                                <label for="final"><h5> Fecha final</h5></label>
                            </div>
                        
                            <div class="col-sm-10">
                                <div class="input-daterange input-group" id="datepicker">
                                    <input type="date" class="input-sm form-control" id="inicio" name="f_inicio"/>
                                    <span class="input-group-addon">hasta</span>
                                    <input type="date" class="input-sm form-control" id="final" name="f_fin" />
                                </div>
                            </div>
                        </div>
            
                        <div class="form-group row">
                            <button class="btn btn-success col-sm-12" 
                            type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Crear</button> 
                        </div>

                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
    
@endsection