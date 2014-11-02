
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Cartelera - Admin</title>
    <!-- Mobile specific metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta name="application-name" content="Cartelera Digital"/>
    <!-- Import google fonts - Heading first/ text second -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,700' rel='stylesheet'
          type='text/css'>
    <!-- Css files -->
    <!-- Icons -->
    <{{ HTML::style('assets/css/icons.css'); }}
    <!-- Bootstrap stylesheets (included template modifications) -->
    {{ HTML::style('assets/css/bootstrap.css'); }}
    <!-- jQueryUI -->
    {{ HTML::style('assets/css/jquery.ui.all.css'); }}
    <!-- Plugins stylesheets (all plugin custom css) -->
    {{ HTML::style('assets/css/plugins.css'); }}
    <!-- Main stylesheets (template main css file) -->
    {{ HTML::style('assets/css/main1.css') }}
    <!-- Custom stylesheets ( Put your own changes here ) -->
    {{ HTML::style('assets/css/custom.css'); }}

    <link rel="icon" href="assets/img/cartelera.ico" type="image/png">
    <!-- Windows8 touch icon ( http://www.buildmypinnedsite.com/ )-->
    <meta name="msapplication-TileColor" content="#3399cc" />
</head>
<body class="error-page">
<div class="container animated fadeInDown">
    <h1 class="error-number">404</h1>
    <h1 class="text-center mb25">No es su culpa, es la nuestra</h1>
    <p class="text-center s24">La página buscada no existe</p>
    <div class="text-center mt25">
        <div class="btn-group">
            <a href="javascript: history.go(-1)" class="btn btn-default btn-lg"><i class="en-arrow-left8"></i>  Retroceder</a>
            <a href="{{url('/')}}" class="btn btn-default btn-lg"><i class="im-home"></i> Inicio</a>
            <a href="{{url('/')}}" class="btn btn-default btn-lg"><i class="st-map"></i> Sistema</a>
            <a href="#" class="btn btn-default btn-lg"><i class="en-mail"></i> Contactar con el Administrador</a>
        </div>
    </div>
</div>
<!-- Javascripts -->
<!-- Important javascript libs(put in all pages) -->
{{ HTML::script('assets/js/jquery-2.1.1.min.js') }}

<script>
    window.jQuery || document.write('<script src="assets/js/libs/jquery-2.1.1.min.js">\x3C/script>')
</script>
{{ HTML::script('assets/js/jquery-ui.js') }}

<script>
    window.jQuery || document.write('<script src="assets/js/libs/jquery-ui-1.10.4.min.js">\x3C/script>')
</script>
<!--[if lt IE 9]>
<script type="text/javascript" src="assets/js/libs/excanvas.min.js"></script>
<script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<script type="text/javascript" src="assets/js/libs/respond.min.js"></script>
<![endif]-->
<!-- Bootstrap plugins -->
{{ HTML::script('assets/js/bootstrap/bootstrap.js') }}

</body>
</html>