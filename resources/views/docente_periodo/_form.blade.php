<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>DoPeriodo</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                    <form  class="form-horizontal form-label-left" action={{ route('docente_periodo.store') }} method="POST">
                        {{ csrf_field() }}
                        <div class="form-group has-feedback{{ $errors->has('docente_id') ? ' has-error' : '' }}">
                            <select class="form-control" style="font-family: 'FontAwesome', Helvetica;" name="docente_id">
                                @foreach($docentes_sin_asignar as $docente_sin_asignar)
                                <option value={{$docente_sin_asignar->id}}> {{$docente_sin_asignar->datosBasico->nombre}} </option>
                                @endforeach
                            </select>
                            <input type="hidden" name="periodo_id" value={{$periodo->id}}>
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('cupos') ? ' has-error' : '' }}">
                            <input type="number" class="form-control" name="cupos"}}" placeholder="Ingrese la cantidad de cupos">
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('nivel') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="nivel"}}" placeholder="Ingrese el Nivel">
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('turno') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="turno"}}" placeholder="Ingrese el Turno">
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('seccion') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="seccion"}}" placeholder="Ingrese la seccion">
                        </div>
                
                        <div>
                            <button class="btn btn-default submit" >Registrar</button>
                        </div>
                        <br>
                </form>
            </div>
        </div>
    </div>
</div>