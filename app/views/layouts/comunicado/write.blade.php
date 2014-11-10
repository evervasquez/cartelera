<script type="text/template" id="write-template">
    <div class="email-write">
            <div class="error_message">
            </div>
        <!-- Start .email-write -->
        {{ Form::open(array('url' => 'comunicados','id' => 'formulario','role'=>'form','class'=>'form-horizontal mt10'))
        }}
        <div class="form-group">
            <div class="col-lg-4 col-md-6 col-xs-6">
                <select class="form-control" name="posicion">
                    <optgroup label="Posicion">
                        <% _(posiciones).each(function(posicion) { %>

                        <option value="<%= posicion.id %>"><%= posicion.posicion %></option>

                                                <% }); %>
                                            </optgroup>
                </select>
            </div>
            <div class="col-lg-4 col-md-6 col-xs-6">
                <select class="form-control" name="tipo">
                    <optgroup label="Tipo Comunicado">
                        <% _(tipos).each(function(tipo) { %>
                            <% if (tipo.id != 2) { %>
                        <option value="<%= tipo.id %>"><%= tipo.descripcion %></option>
                                    <% } %>
                                                <% }); %>
                                            </optgroup>
                </select>
            </div>
            <div class="col-lg-2 col-md-6 col-xs-6">
                <div class="input-group">
                    <input name="fechainicio" class="form-control datetimepicker" type="text" value="">
                    <span class="input-group-addon"><i class="im-calendar4"></i></span>
                </div>
                <span class="help-block">Fecha Inicio</span>
            </div>
            <div class="col-lg-2 col-md-6 col-xs-6">
                <div class="input-group">
                    <input name="fechafin" class="form-control datetimepicker" type="text" value="">
                    <span class="input-group-addon"><i class="im-calendar4"></i></span>
                </div>
                <span class="help-block">Fecha Termino</span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-12">
                <select class="form-control" name="curso">
                    <optgroup label="Cursos">
                        <% _(cursos).each(function(curso) { %>
                        <option value="<%= curso.CodigoCurso %>"><%= curso.DescripcionCurso %></option>
                                                <% }); %>
                                            </optgroup>
                </select>
            </div>
        </div>
        <!-- End .form-group  -->
        <div class="form-group">
            <div class="col-lg-12">
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo">
            </div>
        </div>
        <!-- End .form-group  -->
        <div class="form-group">
            <div class="col-lg-6 col-md-6 col-xs-12">
                <textarea name="comunicado" id="comunicado" class="form-control" rows="9" aria-hidden="true"></textarea>
            </div>
            {{ Form::close() }}

            <div class="col-lg-6 col-md-6 col-xs-12">

                {{ Form::open(array(
                'url'=> 'images',
                'files'=> true,
                'class'=> 'dropzone',
                'id'=>'my-dropzone',
                'method' => 'post'
                ))}}

                {{ Form::close() }}
            </div>
        </div>

        <!-- End .form-group  -->
        <div class="form-group mb20">
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="pull-left">
                    <a href="" class="btn btn-primary action-save"> Enviar</a>
                </div>
                <div class="pull-right">
                    <div class="btn-group dropup">
                        <a href="#" class="mr10 tip color-dark" title="" data-original-title="Discard draft"><i
                            class="im-remove s20"></i></a>
                    </div>
                </div>
            </div>

        </div>
        <!-- End .form-group  -->
    </div>
</script>