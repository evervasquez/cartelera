@extends('layout')

@section('content')

<div class="row panel">
    <div class="panel-heading">
        <div class="panel-heading-content">
            <div class="form-group">
                <label class="col-md-1 text-right">
                    Perfil
                </label>
                <div class="col-md-6 text-center">
                    <select class="form-control" id="perfil"></select>
                </div>
            </div>
        </div>
    </div>
    <div class="form-horizontal panel-body">

        <div class="col-xs-5">
            <div class="widget-box">
                <div class="widget-header">
                    <h4>Lista de Permisos</h4>
                </div>

                <div class="widget-body">
                    <div class="widget-main">
                        <select size="20" multiple class="form-control" id="listPermisos">
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-2 text-center">
            <br/><br/>
            <button type="button" onclick="add()" class="btn btn-primary btn-block btn-sm btn-block-md" title="Agregar">
                <i class="fa fa-arrow-right"></i>
            </button>
            <br/><br/>
            <button type="button" onclick="del()" class="btn btn-danger btn-block btn-sm btn-block-md" title="Eliminar">
                <i class="fa fa-trash"></i>
            </button>
            <br/><br/>
            <a type="button" href="{{ route('permisos') }}" class="btn btn-success btn-block btn-sm btn-block-md" title="Recargar Cambios">
                <i class="fa fa-check"></i>
            </a>
        </div>

        <div class="col-xs-5">
            <div class="widget-box">
                <div class="widget-header">
                    <h4>Permisos del Perfil</h4>
                </div>

                <div class="widget-body">
                    <div class="widget-main">
                        <select size="20" multiple class="form-control" id="permisos">
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-footer">

    </div>
</div>
<script type="text/javascript">
    var lista = $("#listPermisos");
    var permisos = $("#permisos");
    var options = "";
    var perfil = $("#perfil");

    $.ajax({
        type: 'GET',
        url: 'permisos/listar',
        beforeSend: function () {
            //lista.html(cargando);
        },
        success: function (data) {
            var options = "";
            for (var i = 0; i < data.Records.length; i++) {
                options += "<option value='" + data.Records[i].id + "'>" + data.Records[i].modulo + "</option>";
            }
            lista.html(options);
        }
    });

    $.ajax({
        type: 'GET',
        url: 'permisos/getPerfils',
        data: 'jtStartIndex=0&jtPageSize=50',
        beforeSend: function () {
            //perfil.html(cargando);
        },
        success: function (data) {
            var select;
            var options1 = "";
            for (var i = 0; i < data.Records.length; i++) {
                options1 += "<option style='text-align: left;' " + select + " value='" + data.Records[i].id + "'>" + data.Records[i].Perfile + "</option>";
            }
            perfil.html(options1);
        }
    })

    cargarPermisos();

    var add = function () {
        var idperfil = perfil.val();
        var id = lista.val();
        $.ajax({
            type: 'POST',
            url: 'permisos/add',
            data: 'id=' + id+"&idperfil="+idperfil,
            success: function (data) {

                if(parseInt(data.validation_failed) == 0)
                {
                    cargarPermisos();
                }else{
                    bootbox.alert(data.errors);
                }
            }
        })
    }

    var del = function () {
        var idpermiso = permisos.val();
        $.ajax({
            type: 'POST',
            url: 'permisos/del',
            data: 'id=' + idpermiso,
            success: function (data) {

                if(parseInt(data.validation_failed) == 0)
                {
                    cargarPermisos();

                }else if(parseInt(data.validation_failed) == 1){
                    bootbox.alert("hubo un error al eliminar el permiso, Actualice su navegador porfavor");
                }
                else{
                    bootbox.alert("debe escoger un permiso para eliminar");
                }
            }
        })
    }

    perfil.change(function()
    {
        cargarPermisos();
    });


    //funcion que carga los permisos deacuerdo al perfil
    function cargarPermisos()
    {
        var options = "";
        var idperfil = perfil.val();
        if(idperfil==null){
            idperfil = 1;
        }
        $.ajax({
            type: 'GET',
            url: 'permisos/getPermisos',
            data: 'id=' + idperfil,
            beforeSend: function () {
                //permisos.html(cargando);
            },
            success: function (data) {

                for (var i = 0; i < data.Records.length; i++) {
                    options += "<option value='" + data.Records[i].id + "'>" + data.Records[i].modulo + "</option>";
                }
                permisos.html(options);
            }
        });
    }
</script>
@overwrite