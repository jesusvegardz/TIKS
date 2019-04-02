@extends('vdg.layout')
@section('content')

<!-- Page-header start -->
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="icofont icofont-pencil bg-c-yellow"></i>
                <div class="d-inline">
                    <h4>Registrar nuevo alumno</h4>
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
        <h4 class="sub-title">Registro</h4>
        <form class="form" action="/alumno" method="POST" enctype="multipart/form-data">
            @csrf
            

            <div class="col-sm-12"><!--left col-->
                <div class="text-center">
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail">
                    <h6>Subir una foto dieferente...</h6>
                    <input type="file" class="text-center center-block file-upload" name="foto">
                </div>
                <br>
                <br>
                    
            </div><!--/col-3-->
                <div class="tab-content">
                    <div class="form-group row">
                    
                        <div class="col-sm-6">
                            <label for="matricula"><h4>Matrícula</h4></label>
                        <input readonly type="text" name="matricula" class="form-control" id="matricula" value="{{$matricula+1}}">
                        </div>

                    
                        <div class="col-sm-6">
                            <label for="telefono"><h4> Teléfono</h4></label>
                            <input type="text" class="form-control" name="telefono" id="telefono" placeholder="teléfono">
                        </div>
                    </div>
        
                    <div class="form-group row">
                        
                        <div class="col-sm-6">
                            <label for="nombre"><h4>Nombre completo</h4></label>
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="nombre completo del alumno" required>
                        </div>
                        
                        <div class="col-sm-6">
                            <label for="escuela"><h4>Escuela de procedencia</h4></label>
                            <div class="input-group input-group-button">
                                
                                <select class="form-control" name="escuela" required>
                                    <option selected disabled>Seleccione Escuela</option>
                                    @foreach ($escuelas as $escuela)
                                    <option value="{{$escuela->nombre_escuela}}">{{$escuela->nombre_escuela}}</option>
                                    @endforeach
                                </select>
                                <span class="input-group-addon btn btn-default waves-effect" data-toggle="modal" data-target="#escuela_add">
                                    <i class="ti ti-plus"></i>
                                </span>
                            </div>
                        </div>
                            
                    </div>    

                    <div class="form-group row">
                        
                        <div class="col-sm-6">
                            <label for="edad"><h4>Edad</h4></label>
                            <input type="text" class="form-control" name="edad" id="edad" placeholder="edad" required>
                        </div>

                    
                        <div class="col-sm-6">
                            <label for="nivel"><h4>Nivel académico</h4></label>
                            <select class="form-control" name="nivel" id="nivel" required>
                                <option value="0" disable="true" selected="true">Seleccione nivel académico</option>
                                @foreach ($niveles as $nivel)
                                    <option value="{{$nivel->nivel}}">{{ $nivel->nivel }}</option>
                                @endforeach
                            </select>
                        </div>    
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="familiar"><h4>Familiar</h4></label>
                            <input type="text" class="form-control" name="familiar" id="familiar" placeholder="nombre del padre o madre">
                        </div>
                    
                        <div class="col-sm-6">    
                            <label for="grado"><h4>Grado</h4></label>
                            <select class="form-control" name="grado" id="grado" required>
                                <option value="0" disable="true" selected="true">Seleccione grado que cursa actualmente</option>
                            </select>
                        </div>
                        
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="descuento"><h4>Descuento</h4></label>
                            <div class="input-group input-group-success">
                                <span class="input-group-addon">$</span>
                                <input type="number" min="5" max="100" step="5" 
                                class="form-control" name="descuento" id="descuento" placeholder="ingrese el porcentaje">
                                
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <br>
                        <br>
                            <button class="btn btn-primary col-sm-12" 
                            type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Guardar</button> 
                    </div>
                        
                </div><!--/tab-content-->
        
        </form>    

        </form>
    </div>
</div>
<!-- Basic Form Inputs card end -->
    
<!-- MODAL PARA AGREGAR ESCUELAS -->

<div class="modal fade" id="escuela_add" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Nueva Escuela   </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <form action="/escuela" method="POST">
                    @csrf
                        <div class="col-sm-10">
                            <label for="nescuela"><h4>Nombre de la escuela</h4></label>
                            <input type="text" class="form-control" name="nombre_escuela" id="nescuela" placeholder="nombre de la escuela" required>
                        </div>
                        <br>

                        <div class="col-sm-2">
                            <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Guardar</button> 

                        </div>

                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
        
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
    <script type="text/javascript">
        $('#nivel').on('change', function(e){
            console.log(e);
            var nivel = e.target.value;
            $.get('/grado?nivel=' + nivel,function(data) {
            console.log(data);
            $('#grado').empty();
            $('#grado').append('<option value="0" disable="true" selected="true">Seleccione grado que cursa actualmente</option>');

            $.each(data, function(index, gradoObj){
                $('#grado').append('<option value="'+ gradoObj.grado +'">'+ gradoObj.grado +'</option>');
            })
            });
        });
    </script>

@endsection