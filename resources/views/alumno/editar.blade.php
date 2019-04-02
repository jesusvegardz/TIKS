@extends('admin.layout')
@section('content')
    
<div class="box box-primary">
    <div class="box-header with-border">

        
    <form class="form" action="/alumno/{{$alumno->id}}" method="POST" enctype="multipart/form-data">
      @method('PATCH')
        @csrf
            <div class="col-sm-3"><!--left col-->
                <div class="text-center">
                    <img src="../../perfil/{{$alumno->foto}}" class="avatar img-circle img-thumbnail">
                    <h6>Subir una foto dieferente...</h6>
                <input type="file" class="text-center center-block file-upload" name="foto">
                </div><br>
                    
            </div><!--/col-3-->
            <div class="col-sm-9">
                <div class="tab-content">

                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="matricula"><h4>Matrícula</h4></label>
                        <input readonly type="text" class="form-control" id="matricula" name = "matricula" value="{{$alumno->matricula}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="telefono"><h4> Teléfono</h4></label>
                        <input type="text" class="form-control" name="telefono" id="telefono" value="{{$alumno->telefono}}">
                        </div>
                    </div>
        
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="nombre"><h4>Nombre completo</h4></label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{$alumno->nombre}}">
                        </div>
                    </div>
        
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="escuela"><h4>Escuela de procedencia</h4></label>
                            <select class="form-control" name="escuela">
                                <option disable="true" selected="true" value="{{$alumno->escuela}}">{{$alumno->escuela}}</option>
                                @foreach ($escuelas as $escuela)
                                <option value="{{$escuela->nombre_escuela}}">{{$escuela->nombre_escuela}}</option>
                                @endforeach
                            </select>
                        </div>    
                    </div>

                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="edad"><h4>Edad</h4></label>
                        <input type="text" class="form-control" name="edad" id="edad" value="{{$alumno->edad}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="nivel"><h4>Nivel académico</h4></label>
                            <select class="form-control" name="nivel" id="nivel">
                              <option disable="true" selected="true" value="{{$alumno->nivel}}">{{$alumno->nivel}}</option>
                                @foreach ($nivel_list as $nivel)
                                    <option value="{{$nivel->nivel}}">{{ $nivel->nivel }}</option>
                                @endforeach
                            </select>
                        </div>    
                    </div>

                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="familiar"><h4>Familiar</h4></label>
                        <input type="text" class="form-control" name="familiar" id="familiar" value="{{$alumno->familiar}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-6">    
                            <label for="grado"><h4>Grado</h4></label>
                            <select class="form-control" name="grado" id="grado">
                                <option value="0" disable="true" selected="true">Seleccione grado que cursa actualmente</option>
                                <option disable="true" selected="true" value="{{$alumno->grado}}">{{$alumno->grado}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-3">
                            <label for="descuento"><h4>Descuento</h4></label>
                        <input type="text" class="form-control" name="descuento" id="descuento" value="{{$alumno->descuento}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Guardar</button>
                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                        </div>
                </div><!--/tab-content-->
        
            </div><!--/col-9-->
        </form>    
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