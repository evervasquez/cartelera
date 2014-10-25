@extends('login')

@section('content')
<body class="login-page">
<!-- Start #login -->
<div id="login" class="animated bounceIn">
    <div class="alert alert-info fade in">
        <i class="fa fa-comments-o alert-icon s24"></i>
        <strong>Bienvenido!</strong> {{ $datos['nombre'].' '.$datos['apellido'] }}
    </div>
    <div class="login-wrapper">
        <div class="panel panel-warning plain panelMove toggle panelRefresh panelClose">
            <div class="panel-heading">
                @if (Session::has('mensaje'))
                <span class="help-block alert alert-warning"><i class="fa fa-warning"></i> {{  Session::get('mensaje') }}</span>
                @endif
                @if (Session::has('global'))
                <span class="help-block alert alert-success"><i class="fa fa-check "></i> {{ Session::get('global') }}</span>
                @endif

                @if (Session::has('error'))
                <span class="help-block alert alert-danger"><i class="fa fa-warning"></i> {{ Session::get('error') }}</span>
                @endif
                <div class="panel-heading-content">
                    <h4 class="panel-title">Cambie su clave</h4>
                </div>
            </div>
            <div class="panel-body">
                <div class="" id="register">
                    {{ Form::open(array('route' => 'changepasswordpost' ,'id' => 'formulario','class' =>
                    'form-horizontal','role'=>'form')) }}
                    <div class="form-group">
                        <div class="col-lg-12">
                            <!-- col-lg-12 start here -->
                            <input name="old_password"  autofocus type="password" class="form-control left-icon"
                                   placeholder="Contraseña antigua">
                            <i class="fa fa-key s16 left-input-icon"></i>
                            {{ $errors->first('old_password','<p class="error_message">:message</p>') }}
                        </div>
                        <!-- col-lg-12 end here -->
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <!-- col-lg-12 start here -->
                            <input type="password" class="form-control left-icon" onkeypress="sumar()" name="password"
                                   placeholder="Contraseña nueva">
                            <i class="fa fa-key s16 left-input-icon"></i>
                            {{ $errors->first('password','<p class="error_message">:message</p>') }}

                        </div>
                        <!-- col-lg-12 end here -->
                        <div class="col-lg-12 mt15">
                            <!-- col-lg-12 start here -->
                            <input type="password" class="form-control left-icon" name="password_again"
                                   placeholder="repita su contraseña">
                            <i class="fa fa-eye s16 left-input-icon"></i>
                            {{ $errors->first('password_confirmation','<p class="error_message">
                                :message</p>') }}
                        </div>
                        <!-- col-lg-12 end here -->
                    </div>
                    <div class="clearfix">
                        <div class="col-md-offset-6 col-md-12">
                            <!-- col-lg-12 start here -->
                            <button class="btn btn-default" type="submit">Confirmar</button>
                            <a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
                        </div>
                        <!-- col-lg-12 end here -->
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <!-- End #.login-wrapper -->
</div>
</body>
{{ HTML::script('assets/js/jquery.js'); }}

<script language="JavaScript">
    function sumar() {
        i = 1;
    }
    window.onbeforeunload = function (e) {
        try {
            if (i == 1) {
                $.get("flush");
            }
        } catch (e) {
            var e = e || window.event;
            // For IE and Firefox
            if (e) {
                e.returnValue = "Al salir perdera los datos cargados.";
            }
            $.get("flush");
            // For Safari
            return "Al salir perdera los datos cargados.";
        }
    }
</script>
@overwrite