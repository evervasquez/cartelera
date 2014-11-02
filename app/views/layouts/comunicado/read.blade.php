<script type="text/template" id="read-template">
    <div class="row read-message readcomentarios">

        <div class="col-lg-7 col-md-6 col-xs-12 rightPanel">
            <div class="email-read">
                <!-- Start .email-read -->
                <div class="email-header">
                    <h3><%= titulo %>
                        <div class="pull-right">&nbsp;&nbsp;&nbsp;
                            <span class="append-megusta">
                                <% if (totalmegusta == 0) { %>
                                    <% if (totalnomegusta == 0) { %>
                                        <a href="" class="action comunicado-like" style="text-decoration: none; color: #0000ff">
                                        <i class="im-thumbs-up2"></i>&nbsp;<%= totalmegusta %></a>
                                    <% } %>
                                <% }else {%>
                                     <% if (totalnomegusta == 0) { %>
                                         <a class="likeado" style="text-decoration: none; color: #0000ff">
                                         <i class="im-thumbs-up2"></i>&nbsp;Te gusta</a>
                                     <% } %>
                                <% } %>
                            </span>
                            &nbsp;&nbsp;
                            <span class="append-nomegusta">
                                <% if (totalnomegusta == 0) { %>
                                    <% if (totalmegusta == 0) { %>
                                        <a href="" class="action comunicado-notlike" style="text-decoration: none; color: #ff0000">
                                        <i class="im-thumbs-down"></i>&nbsp;<%= totalnomegusta %></a>
                                    <% } %>
                                <% }else {%>
                                    <% if (totalmegusta == 0) { %>
                                         <a class="likeado" style="text-decoration: none; color: #ff0000">
                                         <i class="im-thumbs-down"></i>&nbsp;No te gusta</a>
                                     <% }%>
                                <% } %>
                            </span>
                        </div>
                    </h3>
                    <input type="hidden" id="_id" value="<%= id %>"/>
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
                                        <strong>Documento.pdf</strong>
                                        <div class="btn-group pull-right">
                                            <a href="uploads/<%= urlarchivo1 %>" target="_blank" class="btn btn-default">Descargar</a>
                                        </div>
                                    </li>
                                <% } %>

                                <% if (urlarchivo2 != null) { %>
                                    <li class="list-group-item" >
                                        <span class="label label-danger mr10">PDF</span>
                                        <strong>Documento.pdf</strong>
                                        <div class="btn-group pull-right">
                                            <a href="uploads/<%= urlarchivo2 %>" target="_blank" class="btn btn-default">Descargar</a>
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
                        <form class="new-comentario" id="new-comentario" method="post" action="#" accept-charset="UTF-8">
                            <div class="input-group">
                                <input type="text" autofocus="autofocus" class="form-control" id="comentario" onKeyDown="saltar(this,event,'addcoment');" name="comentario"
                                       placeholder="Ingrese un comentario">
                                <span class="input-group-btn">
                                    <button class="btn btn-teal action comentario-add" type="button" id="addcoment"><i class="im-bubbles4"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="panel-body">
                    <ul class="timeline timeline-advanced" id="comentarios">
                    </ul>
                </div>
            </div>
        </div>
    </div>
</script>

