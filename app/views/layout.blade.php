
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Cartelera - Admin</title>
    <!-- Mobile specific metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta name="application-name" content="Cartelera Digital" />
    <!-- Import google fonts - Heading first/ text second -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,700' rel='stylesheet' type='text/css'>
    <!-- Css files -->
    <script type="text/javascript">
        var $path_base = "<?php echo url('/')?>";
    </script>
    <!-- Icons -->
    {{ HTML::style('assets/css/icons.css'); }}
    {{ HTML::style('assets/css/plugins/font-awesome/css/font-awesome.css'); }}

    {{ HTML::style('assets/css/bootstrap.css'); }}
    {{-- HTML::style('assets/css/jquery.ui.all.css'); --}}

    {{ HTML::style('assets/js/libs/jTable/themes/lightcolor/gray/jtable.css'); }}
    {{ HTML::style('assets/js/libs/jTable/themes/jqueryui/jquery-ui.css'); }}

    {{ HTML::style('assets/css/plugins.css'); }}
    {{ HTML::style('assets/css/main.css'); }}
    {{ HTML::style('assets/css/custom.css'); }}

    {{ HTML::script('assets/js/jquery-2.1.1.min.js') }}
    {{ HTML::script('assets/js/main.js') }}

    <!-- Fav and touch icons -->
    <link rel="icon" href="assets/img/cartelera.ico" type="image/png">
    <!-- Windows8 touch icon ( http://www.buildmypinnedsite.com/ )-->
    <meta name="msapplication-TileColor" content="#3399cc" />
</head>
<body class="ovh">
<div id="preloader">
    <div id="preloader-logo">
        <img src="assets/img/preloader-logo.png" alt="Logo">
    </div>
    <div id="preloader-icon">
        <i class="im-spinner icon-spin"></i>
    </div>
</div>
<!-- Start #header -->
<div id="header">
    <div class="container-fluid">
        <div class="navbar">
            <div class="navbar-header">
                <!-- Show navigation toggle on phones -->
                <button id="showNav" class="navbar-toggle" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Show logo for large screens and laptops -->
                <a class="navbar-brand visible-lg visible-md" href="index.html">
                    <img src="assets/img/logo.png" alt="Jump start">
                </a>
                <!-- Show logo for small screens -->
                <a class="navbar-brand hidden-lg hidden-md hidden-xs" href="index.html">
                    <img src="assets/img/logo-sm.png" alt="Jump start">
                </a>
            </div>
            <nav id="top-nav" class="navbar-no-collapse" role="navigation">
                <!-- navbar search form -->
                <form class="navbar-form navbar-left hidden-sm hidden-xs" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" placeholder="Search for something ...">
                        <i class="im-search3"></i>
                    </div>
                    <button type="submit" class="btn">submit</button>
                </form>
                <!-- Navbar nav -->
                <ul class="nav navbar-nav pull-right">
                    <li class="hidden-lg hidden-md">
                        <!-- close button for search form in small screens -->
                        <button type="button" class="close closeSearchForm" aria-hidden="true">&times;</button>
                        <!-- show search button in small screens -->
                        <a class="resSearchBtn hidden-lg hidden-md" href="#"><i class="im-search3"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown">
                            <i class="im-earth"></i>
                            <i class="nav-notification im-circle2"></i>
                            <span class="sr-only">Notifications</span>
                        </a>
                        <ul class="dropdown-menu right dropdown-notification" role="menu">
                            <li><a href="#" class="dropdown-menu-header">Notifications</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="im-user"></i> 1 User is registred</a>
                            </li>
                            <li><a href="#"><i class="im-bubble12"></i> Samy add 1 comment</a>
                            </li>
                            <li><a href="#"><i class="im-power"></i> 5 min server downtime</a>
                            </li>
                            <li><a href="#"><i class="im-database"></i> Databse backup is complete</a>
                            </li>
                            <li><a href="#"><i class="im-github3"></i> SuggeElson push 1 commit</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#" class="view-all">View all</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown">
                            <i class="im-envelop2"></i>
                            <span class="sr-only">New Emails</span>
                        </a>
                        <ul class="dropdown-menu dropdown-email right" role="menu">
                            <li><a href="#" class="dropdown-menu-header">Messages</a>
                            </li>
                            <li class="divider"></li>
                            <li class="clearfix">
                                <a href="#">
                                    <img class="avatar pull-left" src="assets/img/avatars/11.jpg" alt="Jean">Hello, please check out my account i not have abbility to ...
                                    <span class="time-ago">1 min ago</span>
                                </a>
                            </li>
                            <li class="clearfix">
                                <a href="#">
                                    <img class="avatar pull-left" src="assets/img/avatars/10.jpg" alt="Jonh">I want to purchase one of your products can you help me ...
                                    <span class="time-ago">3 hours ago</span>
                                </a>
                            </li>
                            <li class="clearfix">
                                <a href="#">
                                    <img class="avatar pull-left" src="assets/img/avatars/6.jpg" alt="Smith">I register in formum but not have access to write ...
                                    <span class="time-ago">15 hours ago</span>
                                </a>
                            </li>
                            <li class="clearfix">
                                <a href="#">
                                    <img class="avatar pull-left" src="assets/img/avatars/8.jpg" alt="Jean">What`s happen with my order i already purchase it and ...
                                    <span class="time-ago">3 days ago</span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#" class="view-all">View all</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown" id="cartelera-avatar">
                        <a href="#" data-toggle="dropdown">
                            <img class="avatar" src="assets/img/avatars/1.jpg" width="36" height="36" alt="Jonh Doe"> <span class="avatar-name">{{ Auth::user()->nombres.' '.Auth::user()->apellidos}}</span>
                            <span class="caret ml5"></span>
                        </a>
                    </li>
                    <li>
                        <a title="Cerrar Sesión" href="{{ url('/logout') }}">
                            <i class="im-esc"></i>
                            <span class="sr-only">Cerrar Sesión</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- End #header -->
<!-- Start #sidebar -->
<aside id="sidebar">
    <!-- Start .sidebar-inner -->
    <div class="sidebar-inner">
        <!-- Start .toggle-sidebar -->
        <div class="toggle-sidebar">
            <a href="#"><i class="im-arrow7"></i></a>
        </div>
        <!-- End .toggle-sidebar -->
        <!-- Start .option-buttons -->
        <div class="option-buttons">
            <div class="option-buttons-inner">
                <form id="search-nav">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Find menu item">
                        <i class="im-search3"></i>
                    </div>
                    <button type="submit" class="btn">submit</button>
                    <a id="close-search-nav" class="close" aria-hidden="true" href="#">&times;</a>
                </form>
                <a href="#" class="search-in-menu btn btn-default btn-sm tip" title="Search in navigation"><i class="im-search3"></i></a>
                <a href="#" class="expand-subs btn btn-default btn-sm tip" title="Expand all SubMenus"><i class="im-sort2"></i></a>
                <a href="#" class="mute-sounds btn btn-default btn-sm tip" title="Mute template sounds"><i class="im-volume-medium"></i></a>
                <a href="#" class="reset-layout btn btn-default btn-sm tip" title="Reset panels position"><i class="im-spinner12"></i></a>
                <a href="#" class="launch-fullscreen btn btn-default btn-sm tip" title="Launch full screen"><i class="im-expand"></i></a>
            </div>
        </div>
        <!-- End .option-buttons -->
        <!-- Start .sidebar-scrollarea -->
        <div class="sidebar-scrollarea">
            <h5 class="sidebar-title">Navigation</h5>
            <ul id="sideNav" class="nav nav-pills nav-stacked show-arrows">
                <li><a href="{{ url('/') }}"><i class="im-screen"></i> <span class="txt">Inicio</span></a></li>
                    @foreach ($modulos as $modulo)
                    <li>
                    <a href="#"><i class="{{ $modulo['icono'] }}"></i> <span class="txt">{{ $modulo['descripcion'] }}</span></a>
                        <ul class="sub">
                        @foreach ($modulo['enlaces'] as $option)
                            <li><a href="{{ $option['url'] }}"><i class="im-arrow-right3"></i> <span class="txt">{{ $option['descripcion'] }}</span></a>
                            </li>
                        @endforeach
                        </ul>
                    </li>
                    @endforeach
            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- End .sidebar-scrollarea -->
    </div>
    <!-- End .sidebar-inner -->
</aside>
<!-- End #sidebar -->
<!-- Start #right-sidebar -->
<aside id="right-sidebar" class="hide-sidebar">
    <!-- Start .sidebar-inner -->
    <div class="sidebar-inner">
        <!-- Start .sidebar-panel -->
        <div class="sidebar-panel mt0">
            <!-- Start sidebar-panel-content -->
            <div class="sidebar-panel-content fullwidth pt0">
                <!-- Start chat-user-list -->
                <div class="chat-user-list">
                    <form class="form-horizontal chat-search" role="form">
                        <div class="form-group">
                            <input type="text" class="form-control input-sm" placeholder="Search for user...">
                            <button type="submit"><i class="im-search3 s16"></i>
                            </button>
                        </div>
                        <!-- End .form-group  -->
                    </form>
                    <ul class="chat-ui bsAccordion">
                        <li>
                            <a href="#" class="chat-ui-heading">Favorites <span class="users-count">(3)</span></a>
                            <ul class="in">
                                <li>
                                    <a href="#" class="chat-name">
                                        <span class="chat-notification">8</span>
                                        <img class="chat-avatar" src="assets/img/avatars/2.jpg" alt="@chadengle">Chad Engle
                                        <span class="status online"><i class="im-circle-small"></i></span>
                                        <span class="device"><i class="im-mobile2"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="chat-name">
                                        <span class="chat-notification">2</span>
                                        <img class="chat-avatar" src="assets/img/avatars/3.jpg" alt="@jason">Jason Moore
                                        <span class="status busy"><i class="im-circle-small"></i></span>
                                        <span class="device"><i class="im-tablet"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="chat-name">
                                        <img class="chat-avatar" src="assets/img/avatars/11.jpg" alt="@jenny">Jenny Lee
                                        <span class="status offline"><i class="im-circle-small"></i></span>
                                        <span class="device"><i class="im-screen4"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="chat-ui-heading">Online <span class="users-count">(4)</span></a>
                            <ul class="in">
                                <li>
                                    <a href="#" class="chat-name">
                                        <img class="chat-avatar" src="assets/img/avatars/3.jpg" alt="@chadengle">Annete Swartz
                                        <span class="status online"><i class="im-circle-small"></i></span>
                                        <span class="device"><i class="im-mobile2"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="chat-name">
                                        <img class="chat-avatar" src="assets/img/avatars/5.jpg" alt="@tod">Todd Simpson
                                        <span class="status online"><i class="im-circle-small"></i></span>
                                        <span class="device"><i class="im-mobile2"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="chat-name">
                                        <img class="chat-avatar" src="assets/img/avatars/6.jpg" alt="@danny">Danny Jonsons
                                        <span class="status online"><i class="im-circle-small"></i></span>
                                        <span class="device"><i class="im-screen4"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="chat-name">
                                        <img class="chat-avatar" src="assets/img/avatars/7.jpg" alt="@steve">Steeve Sidwell
                                        <span class="status online"><i class="im-circle-small"></i></span>
                                        <span class="device"><i class="im-tablet"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="chat-ui-heading">Offline <span class="users-count">(3)</span></a>
                            <ul class="in">
                                <li>
                                    <a href="#" class="chat-name">
                                        <img class="chat-avatar" src="assets/img/avatars/8.jpg" alt="@jenna">Jenna Jamson
                                        <span class="status offline"><i class="im-circle-small"></i></span>
                                        <span class="device"><i class="im-screen4"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="chat-name">
                                        <img class="chat-avatar" src="assets/img/avatars/9.jpg" alt="@selena">Selena Gomez
                                        <span class="status offline"><i class="im-circle-small"></i></span>
                                        <span class="device"><i class="im-mobile2"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="chat-name">
                                        <img class="chat-avatar" src="assets/img/avatars/10.jpg" alt="@mickey">Mickey Blue
                                        <span class="status offline"><i class="im-circle-small"></i></span>
                                        <span class="device"><i class="im-mobile2"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- End chat-user-list -->
                <!-- Start chat-box -->
                <div class="chat-box">
                    <h5>
                        <span class="device"><i class="im-screen4"></i></span>
                        <span class="status online"><i class="im-circle-small"></i></span> Chad Engle
                    </h5>
                    <a id="close-user-chat" class="close" aria-hidden="true">&times;</a>
                    <ul class="chat-messages">
                        <li>
                            <div class="avatar">
                                <img src="assets/img/avatars/3.jpg" alt="@chadengle">
                            </div>
                            <div class="message">
                                <p class="chat-name">Chad Engle <span class="chat-time">15 sec ago</span>
                                </p>
                                <p class="chat-txt">Hello Sugge check out the last order.</p>
                            </div>
                        </li>
                        <li class="chat-me">
                            <div class="avatar">
                                <img src="assets/img/avatars/1.jpg" alt="@jonhdoe">
                            </div>
                            <div class="message">
                                <p class="chat-name">Jonh Doe <span class="chat-time">10 sec ago</span>
                                </p>
                                <p class="chat-txt">Ok i will check it out.</p>
                            </div>
                        </li>
                        <li>
                            <div class="avatar">
                                <img src="assets/img/avatars/3.jpg" alt="@chadengle">
                            </div>
                            <div class="message">
                                <p class="chat-name">Chad Engle <span class="chat-time">now</span>
                                </p>
                                <p class="chat-txt">Okay, thank you very much.</p>
                            </div>
                        </li>
                    </ul>
                    <div class="chat-write">
                        <form action="#" class="form-horizontal" role="form">
                            <div class="form-group">
                                <textarea name="sendmsg" id="sendMsg" class="form-control elastic" rows="1"></textarea>
                                <a role="button" class="btn" id="attach_photo_btn">
                                    <i class="im-image2 s20"></i>
                                </a>
                                <input type="file" name="attach_photo" id="attach_photo" class="unstyled">
                            </div>
                            <!-- End .form-group  -->
                        </form>
                    </div>
                </div>
                <!-- End chat-box -->
            </div>
            <!-- End sidebar-panel-content -->
        </div>
        <!-- End .sidebar-panel -->
    </div>
</aside>
<!-- End .sidebar-inner -->
</aside>
<!-- Start #right-sidebar -->
<!-- Start #content -->
<div id="content">
<!-- Start .content-wrapper -->
<div class="content-wrapper">
<div id="page-heading" class="page-header">
    <h2><i class="icon im-home2"></i> Dashboard</h2>
    <!-- Start .bredcrumb -->
    <ul id="crumb" class="breadcrumb">
    </ul>
    <!-- End .breadcrumb -->
</div>
<!-- Start .content-inner -->
<div class="content-inner">
<!-- Start .row -->
@section('content')

<div class="shortcut-buttons">
    <!-- Start .shortcut buttons -->
    <a href="#" class="shortcut-btn">
                                    <span class="shortcut-icon">
                        <i class="im-file8"></i>
                    </span>
        <span class="shortcut-text">Add Page</span>
    </a>
    <a href="#" class="shortcut-btn">
                                    <span class="shortcut-icon">
                        <i class="im-upload6"></i>
                    </span>
        <span class="shortcut-text">Upload File</span>
    </a>
    <a href="#" class="shortcut-btn">
                                    <span class="shortcut-icon">
                        <i class="im-pencil5"></i>
                    </span>
        <span class="shortcut-text">Write article</span>
    </a>
    <a href="#" class="shortcut-btn">
                                    <span class="shortcut-icon">
                        <i class="im-database"></i>
                    </span>
        <span class="shortcut-text">Backups</span>
    </a>
    <a href="#" class="shortcut-btn">
                                    <span class="shortcut-icon">
                        <i class="im-bubbles"></i>
                    </span>
        <span class="shortcut-text">Comments</span>
        <span class="label label-info">3</span>
    </a>
    <a href="#" class="shortcut-btn">
                                    <span class="shortcut-icon">
                        <i class="im-user-plus2"></i>
                    </span>
        <span class="shortcut-text">Add User</span>
    </a>
</div>

@show
<!-- col-lg-4 end here -->
</div>
<!-- End .row -->
</div>
<!-- End .content-inner -->
</div>
<!-- End .content-wrapper -->
<div class="clearfix"></div>
</div>
<!-- Important javascript libs(put in all pages) -->

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

{{ HTML::script('assets/js/bootstrap/bootstrap.js') }}

<!-- Core plugins ( not remove ) -->
{{ HTML::script('assets/js/libs/modernizr.custom.js') }}

<!-- Handle responsive view functions -->
{{ HTML::script('assets/js/jRespond.min.js') }}
<!-- Custom scroll for sidebars,tables and etc. -->

{{ HTML::script('assets/js/libs/slimscroll/jquery.slimscroll.min.js') }}
{{ HTML::script('assets/js/libs/slimscroll/jquery.slimscroll.horizontal.min.js') }}

<!-- Highlight code blocks -->
{{ HTML::script('assets/js/libs/misc/highlight/highlight.pack.js') }}
<!-- Handle template sounds -->
{{-- HTML::script('assets/js/libs/misc/ion.sound.js') --}}

<!-- Proivde quick search for many widgets -->
{{ HTML::script('assets/js/libs/quicksearch/jquery.quicksearch.js') }}

<!-- Prompt modal -->
{{ HTML::script('assets/js/libs/ui/bootbox/bootbox.js') }}
{{ HTML::script('assets/js/libs/jqueryui/js/jquery-ui.min.js') }}

<!-- Other plugins ( load only nessesary plugins for every page) -->
{{ HTML::script('assets/js/jquery.icheck.js') }}

{{ HTML::script('assets/js/date.js') }}
{{ HTML::script('assets/js/jquery.sparkline.js') }}
{{ HTML::script('assets/js/jquery.easy-pie-chart.js') }}
{{ HTML::script('assets/js/skyicons.js') }}
{{ HTML::script('assets/js/fullcalendar.js') }}
{{ HTML::script('assets/js/jquery.appStart.js') }}
{{ HTML::script('assets/js/app.js') }}
{{ HTML::script('assets/js/libs/jTable/jquery.jtable.js') }}
{{ HTML::script('assets/js/libs/jTable/localization/jquery.jtable.es.js') }}
{{ HTML::script('assets/js/dashboard.js') }}
</body>
</html>