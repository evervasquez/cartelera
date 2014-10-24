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
            title: "Lista de Perfiles Activos",
            paging: true,
            sorting: true,
            actions: {
                listAction: "perfiles/list",
                createAction: "perfiles/create",
                updateAction: "perfiles/update",
                deleteAction: "perfiles/delete"
            },
            messages: {
                addNewRecord: 'Nuevo perfil',
                editRecord: 'Editar perfil'
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
                Perfile: {
                    title: 'Perfil',
                    whidth: '30%'
                }
            },
            formCreated: function (event, data) {
                data.form.find('input[name="perfil"]').attr('onkeypress','return soloLetras(event)');
            },
            formSubmitting: function (event, data) {
                bval = true;
                bval = bval && data.form.find('input[name="perfil"]').required();
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