@extends('layout')

@section('content')

<div class="row">
    <div class="col-md-9">
        <div id="tablecontainer"></div>
    </div>
    <div class="col-md-3 ultimas_mod"></div>
    <div id="leyenda"></div>
</div>
<script type="application/javascript">

    $(document).ready(function () {

        $("#tablecontainer").jtable({
            title: "Lista de Usuarios",
            paging: true,
            sorting: true,
            actions: {
                listAction: "usuarios/list",
                createAction: "usuarios/create",
                updateAction: "usuarios/update",
                deleteAction: "usuarios/delete"
            },
            messages: {
                addNewRecord: 'Nuevo usuario',
                editRecord: 'Editar usuario'
            },
            toolbar: {
                items:
                    [{
                        cssClass: 'buscador',
                        text: buscador,
                    }]
            },
            fields: {
                id: {
                    key: true,
                    create: false,
                    edit: false,
                    list: false
                },
                codigo: {
                    title: 'Código'
                },
                perfil: {
                    title: 'Perfil',
                    whidth: '20%',
                    options: 'usuarios/getPerfiles'
                },
                nombres: {
                    title: 'Nombres',
                    whidth: '20%'
                },
                apellidos: {
                    title: 'Apellidos',
                    whidth: '20%'
                },
                idfacultad: {
                    title: 'Facultad',
                    whidth: '20%'
                },
                usuario: {
                    title: 'Usuario',
                    whidth: '20%'
                },
                clave: {
                    title: 'Clave',
                    type: 'password',
                    list: false
                },
                telefono: {
                    title: 'Telefono'
                }
            },
            formCreated: function (event, data) {
                data.form.find('input[name="nombres"]').attr('onkeypress','return soloLetras(event)');
                data.form.find('input[name="apellidos"]').attr('onkeypress','return soloLetras(event)');
                data.form.find('input[name="telefono"]').attr('onkeypress','return numeroTelefonico(event)');
            },
            formSubmitting: function (event, data) {
                bval = true;
                bval = bval && data.form.find('input[name="nombres"]').required();
                bval = bval && data.form.find('input[name="apellidos"]').required();
                bval = bval && data.form.find('input[name="usuario"]').required();
                bval = bval && data.form.find('input[name="clave"]').required();
                bval = bval && data.form.find('input[name="email"]').email();
                bval = bval && data.form.find('input[name="direccion"]').required();
                bval = bval && data.form.find('input[name="telefono"]').required();
                if (bval)
                    return true;
                return false;
            }

        });

        $('#LoadRecordsButton').click(function (e) {
            e.preventDefault();
            $('#tablecontainer').jtable('load', {
                search: $('#search').val()
            });
        });

        $('#LoadRecordsButton').click();

    });

</script>
@overwrite