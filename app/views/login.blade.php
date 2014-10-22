<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Cartelera</title>
    <!-- Mobile specific metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Force IE9 to render in normal mode -->
    <!--[if IE]>
    <meta http-equiv="x-ua-compatible" content="IE=9"/><![endif]-->
    <meta name="application-name" content="Cartelera Digital"/>
    <!-- Import google fonts - Heading first/ text second -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,700' rel='stylesheet'
          type='text/css'>
    <!-- Css files -->
    <!-- Icons -->
    {{ HTML::style('assets/css/plugins/font-awesome/css/font-awesome.css'); }}

    <!-- Bootstrap stylesheets (included template modifications) -->
    {{ HTML::style('assets/css/bootstrap.css'); }}

    <!-- Plugins stylesheets (all plugin custom css) -->
    {{ HTML::style('assets/css/plugins.css'); }}

    <!-- Main stylesheets (template main css file) -->
    {{ HTML::style('assets/css/main.css'); }}

    <meta name="msapplication-TileColor" content="#3399cc"/>
</head>
<body class="login-page">
<!-- Start #login -->
<div id="login" class="animated bounceIn">
    <div class="login-wrapper">
        <div id="myTabContent" class="tab-content bn">
            <div class="tab-pane fade active in" id="log-in">
                <div class="social-buttons text-center mt25">
                    <a href="#" class="btn btn-primary btn-alt btn-round btn-lg mr10"><i class="fa fa-facebook s24"></i></a>
                    <a href="#" class="btn btn-primary btn-alt btn-round btn-lg mr10"><i class="fa fa-twitter s24"></i></a>
                    <a href="#" class="btn btn-danger btn-alt btn-round btn-lg mr10"><i
                            class="fa fa-google-plus s24"></i></a>
                    <a href="#" class="btn btn-info btn-alt btn-round btn-lg"><i class="fa fa-linkedin s24"></i></a>
                </div>
                <div class="seperator">
                    <strong>or</strong>
                    <hr>
                </div>
                {{ Form::open(array('route' => 'login','id' => 'formulario','action'
                =>'login','role'=>'form','class'=>'form-horizontal mt10')) }}
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="text" name="username" id="username" class="form-control left-icon"
                               autofocus placeholder="Tu usuario ...">
                        <i class="im-user s16 left-input-icon"></i>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="password" name="password" id="password" class="form-control left-icon"
                               placeholder="Tu contraseña">
                        <i class="im-lock s16 left-input-icon"></i>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-7">
                        <!-- col-lg-12 start here -->
                        <label class="checkbox">
                            <input type="checkbox" name="remember" id="remember" value="option">Recordarme ?
                        </label>
                    </div>
                    <!-- col-lg-12 end here -->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-4 mb25">
                        <!-- col-lg-12 start here -->
                        <button class="btn btn-default pull-right" type="submit">Iniciar</button>
                    </div>
                    <!-- col-lg-12 end here -->
                </div>
                {{ Form::close() }}
                @if (Session::has('global'))
                <span class="help-block alert alert-success"><i
                        class="fa fa-check "></i> {{ Session::get('global') }}</span>
                @endif

                @if (Session::has('error'))
                <span class="help-block alert alert-danger"><i
                        class="fa fa-warning"></i> {{ Session::get('error') }}</span>
                @endif
            </div>
        </div>
    </div>
    <!-- End #.login-wrapper -->
</div>
{{ HTML::script('assets/js/jquery-2.1.1.min.js') }}
</body>
</html>