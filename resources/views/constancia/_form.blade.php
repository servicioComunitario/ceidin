<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Solicitud de constancia Periodo</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                    <form  class="form-horizontal form-label-left" action={{ route('constancia.store') }} method="POST">
                        {{ csrf_field() }}
                        <div class="form-group has-feedback{{ $errors->has('docente_id') ? ' has-error' : '' }}">
                            <select class="form-control" style="font-family: 'FontAwesome', Helvetica;" name="alumno_id">
                                @foreach($alumnos as $alumno)
                                <option value={{$alumno->datosBasico->id}}> {{$alumno->datosBasico->nombre}} </option>
                                @endforeach
                            </select>
                        </div>
                
                        <div>
                            <button class="btn btn-default submit" >Solicitar</button>
                        </div>
                        <br>
                </form>
            </div>
        </div>
    </div>
</div>