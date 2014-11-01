<script type="text/template" id="read-template">
    <div class="row read-message readcomentarios">
        <div class="col-lg-7 col-md-6 col-xs-12 rightPanel">
            <div class="email-read">
                <!-- Start .email-read -->
                <div class="email-header">
                    <h3><%= titulo %></h3>
                </div>
                <div class="email-info-bar">
                    <div class="row">
                        <div class="from col-lg-8">
                            Curso : <%= curso %> / <a href="#"><strong><%= usuario %></strong></a>
                        </div>
                        <div class="date col-lg-4 text-right">
                            <span class="email-date"><%= fechacreacion %></span>
                        </div>
                    </div>
                </div>
                <div class="email-content">
                    <!-- Start .email-content -->
                    <!-- This is just example email text  -->
                    <div class="row comunicado-contenido">
                        <div class="col-md-12">
                            <div class="text-dark comunicado-content" style="min-height: 10em; max-height: 11em">
                                <%= comunicado %>
                            </div>
                        <div class="text-success">
                            Imagenes relacionadas
                        </div>
                            <% if (urlimagen1 != null) { %>
                            <div class="col-lg-6 col-md-6 col-xs-12" style="min-height: 15em; max-height: 15em">
                                <img src="uploads/<%= urlimagen1 %>" alt="" class="mfp-img"/>
                            </div>
                            <% } %>
                            <% if (urlimagen2 != null) { %>
                            <div class="col-lg-6 col-md-6 col-xs-12" style="min-height: 15em; max-height: 15em">
                                <img src="uploads/<%= urlimagen2 %>" alt="" class="mfp-img"/>
                            </div>
                            <% } %>
                        </div>
                        <div class="attached-files archivopdf" style="position: absolute; bottom: 0;max-width: 90%">
                            <!-- Start .attached-files -->
                            <ul class="list-group" >
                                <% if (urlarchivo1 != null) { %>
                                    <li class="list-group-item col-md-12" >
                                        <span class="label label-danger mr10">PDF</span>
                                        <strong>Raport.pdf</strong>
                                        <div class="btn-group pull-right">
                                            <a href="#" class="btn btn-default">View</a>
                                            <a href="#" class="btn btn-default">Download</a>
                                        </div>
                                    </li>
                                <% } %>

                                <% if (urlarchivo2 != null) { %>
                                    <li class="list-group-item" >
                                        <span class="label label-danger mr10">PDF</span>
                                        <strong>Raport.pdf</strong>
                                        <div class="btn-group pull-right">
                                            <a href="#" class="btn btn-default">View</a>
                                            <a href="#" class="btn btn-default">Download</a>
                                        </div>
                                    </li>
                                <% } %>
                            </ul>
                        </div>
                        <!-- End .attached-files -->
                    </div>
                </div>
                <!-- End .email-content -->
            </div>

        </div>
        <div class="col-lg-5 col-md-6 col-xs-12 comentarioRight">
            <div class="panel panel-default plain toggle panelMove panelClose panelRefresh comentarioschat" id="jst_3">
                <!-- Start .panel -->
                <div class="panel-heading titleultimoscomentarios">
                    <h4 class="panel-title"><i class="im-lightning"></i> Últimos Comentarios</h4>

                    <div class="panel-controls col-md-12">
                        <a href="#" class="panel-refresh"><i class="im-spinner12"></i></a>
                    </div>
                    <div class="ingresecomentario col-md-12">
                        <form class="new-message" method="post" action="#" accept-charset="UTF-8">
                            <div class="input-group">
                                <input type="text" class="form-control" id="message_body" name="message[body]"
                                       placeholder="Ingrese un comentario">
                    <span class="input-group-btn">
                        <button class="btn btn-teal" type="button"><i class="fa fa-plus"></i></button>
                    </span>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="panel-body">
                    <ul class="timeline timeline-advanced">
                        <li>
                            <span class="date-time">15 sec ago</span>
                            <label class="timeline-label">
                                <i class="im-image2"></i>
                            </label>
                            <h5 class="timeline-event-title">New picture is uploaded</h5>

                            <div class="timeline-event">
                                <img src="assets/img/gallery/1.jpg" alt="pic1" height="75px;">
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
                    </ul>

                </div>

            </div>
        </div>
    </div>
</script>
