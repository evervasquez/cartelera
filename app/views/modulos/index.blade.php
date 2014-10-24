@extends('layout')

@section('content')

<div class="row">
    <div class="col-md-9">
        <div id="tablecontainer" class="jtable"></div>
    </div>
    <div class="col-md-3 ultimas_mod"></div>
    <div id="leyenda"></div>
</div>
<script type="application/javascript">

    $(document).ready(function () {

        $("#tablecontainer").jtable({
            title: "Lista de Modulos",
            paging: true,
            sorting: true,
            actions: {
                listAction: "modulos/list",
                createAction: "modulos/create",
                updateAction: "modulos/update",
                deleteAction: "modulos/delete"
            },
            messages: {
                addNewRecord: 'Nuevo modulo',
                editRecord: 'Editar modulo'
            },
            toolbar: {
                items: [{
                    cssClass: 'buscador',
                    text: buscador
                }]
            },
            fields: {
                id: {
                    key: true,
                    create: false,
                    edit: false,
                    list: false
                },
                modulo: {
                    title: 'Modulo',
                    width: '30%'
                },
                url: {
                    title: 'Url',
                    width: '25%'
                },
                icono: {
                    title: 'Icono',
                    width: '25%'
                },
                modulo_padre: {
                    title: 'Padre',
                    options: 'modulos/parents',
                    width: '20%'
                }
            },
            formCreated: function (event, data) {
                data.form.find('input[name="modulo"]').attr('onkeypress','return soloLetras(event)');
            },
            formSubmitting: function (event, data) {
                bval = true;
                bval = bval && data.form.find('input[name="modulo"]').required();
                bval = bval && data.form.find('input[name="url"]').required();
                bval = bval && data.form.find('input[name="modulo_padre"]').required();
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