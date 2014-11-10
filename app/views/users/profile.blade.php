@extends('layout')

@section('content')
    <!-- Start .row -->
    <div class="row">
        <div class="col-lg-6 col-md-8">
            <!-- col-lg-8 start here -->
            <div class="panel panel-default plain" id="jst_0">
                <!-- Start .panel -->
                <div class="panel-body pt20">
                    <div class="profile-cover">
                        <img class="img-responsive" src="assets/img/profile-cover.jpg" alt="Profile cover">
                        <a href="{{ route('login.fb') }}" id="change-cover" class="btn btn-white btn-alt btn-sm">
                            <span class="color-white"><i class="im-image2"></i> Login con Facebook</span>
                        </a>
                        <div class="profile">
                            @if(Auth::user()->fotoperfil == null)
                            <img src="assets/img/avatars/128.jpg" alt="Jonh Doe">
                            @else
                            {{HTML::image('assets/img/facebook/'.Auth::user()->fotoperfil,'profile',array('width' => '160px','height'=>'120px'))}}
                            @endif
                            <a href="#" id="change-profile-image" class="btn btn-white btn-round btn-sm">
                                <i class="im-camera3"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .panel -->
        </div>
        <!-- col-lg-8 end here -->
        <div class="col-lg-6 col-md-4">
            <!-- col-lg-4 start here -->
            <div class="panel panel-default plain toggle panelRefresh" id="jst_1">
                <!-- Start .panel -->
                <div class="panel-heading">
                    <h4 class="panel-title">Información Básica</h4>
                    <div class="panel-controls"><a href="#" class="panel-refresh"><i class="im-spinner12"></i></a><a href="#" class="toggle panel-minimize"><i class="im-minus"></i></a></div></div>
                <div class="panel-body">
                    <ul class="list-unstyled">
                        <li><i class="im-user mr5 color-teal"></i> {{ $datos[0]->nombres.' '.$datos[0]->apellidopaterno.' '.$datos[0]->apellidomaterno }}
                            @if(Auth::user()->idperfil == 1)
                                <span class="label label-danger">admin</span>
                            @endif
                        </li>
                        <li><i class="im-mobile mr5 color-teal"></i> +234 345 887</li>
                        <li><i class="im-location mr5 color-teal"></i> San Martin, Tarapoto</li>
                        <li><i class="im-envelop2 mr5 color-teal"></i> {{ $datos[0]->correo }}</li>
                        @if(isset($datos[0]->facultad))
                            <li><i class="fa fa-university mr5 color-teal"></i> {{$datos[0]->facultad}}</li>
                        @endif
                        @if(Auth::user()->idperfil == 2)
                            <li><i class="fa fa-paperclip mr5 color-teal"></i> {{$datos[0]->usuario}}</li>
                        @else
                            <li><i class="im-code mr5 color-teal"></i> {{$datos[0]->usuario}}</li>
                        @endif
                    </ul>
                </div>
            </div>
            <!-- End .panel -->
        </div>
        <!-- col-lg-4 end here -->
    </div>
    <!-- End .row -->
    <div class="row">
        <!-- col-lg-6 end here -->
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 sortable-layout ui-sortable">
            <!-- col-lg-4 start here -->
            <div class="panel panel-default plain toggle panelMove panelClose panelRefresh" id="jst_3">
                <!-- Start .panel -->
                <div class="panel-heading">
                    <h4 class="panel-title"><i class="im-lightning"></i> Last activity</h4>
                    <div class="panel-controls"><a href="#" class="panel-refresh"><i class="im-spinner12"></i></a><a href="#" class="toggle panel-minimize"><i class="im-minus"></i></a><a href="#" class="panel-close"><i class="im-close"></i></a></div></div>
                <div class="panel-body">
                    <ul class="timeline timeline-advanced">
                        <li>
                            <span class="date-time">15 sec ago</span>
                            <label class="timeline-label">
                                <i class="im-image2"></i>
                            </label>
                            <h5 class="timeline-event-title">New picture is uploaded</h5>
                            <div class="timeline-event">
                                @if(Auth::user()->fotoperfil == null)
                                <img src="assets/img/avatars/1.jpg" alt="pic1" height="75px;">
                                @else
                                {{HTML::image('assets/img/facebook/'.Auth::user()->fotoperfil,'profile',array('height'=>'75px'))}}
                                @endif
                            </div>
                        </li>
                        <li>
                            <span class="date-time">2 min ago</span>
                            <label class="timeline-label">
                                <i class="im-users"></i>
                            </label>
                            <h5 class="timeline-event-title">3 users are registred</h5>
                            <div class="timeline-event">
                                <img src="assets/img/avatars/2.jpg" alt="user1" class="mr10">
                                <img src="assets/img/avatars/3.jpg" alt="user1" class="mr10">
                                <img src="assets/img/avatars/4.jpg" alt="user1">
                            </div>
                        </li>
                        <li>
                            <span class="date-time">1 day ago</span>
                            <label class="timeline-label">
                                <i class="im-database"></i>
                            </label>
                            <h5 class="timeline-event-title">Backup is complete</h5>
                            <div class="timeline-event">
                                <a class="btn btn-default" href="#"> Download Raport</a>
                            </div>
                        </li>
                        <li>
                            <span class="date-time">2 day ago</span>
                            <label class="timeline-label">
                                <i class="im-bubble"></i>
                            </label>
                            <h5 class="timeline-event-title">New comment</h5>
                            <div class="timeline-event">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis modi, deserunt ex praesentium saepe itaque ut explicabo dolores odio expedita quaerat veniam architecto sit commodi, necessitatibus adipisci
                                    esse ea nisi.</p>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-sm">Approve</button>
                                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End .panel -->
        </div>
        <!-- col-lg-6 end here -->
    </div>
    <!-- End .row -->
@overwrite