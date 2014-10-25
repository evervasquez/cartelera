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
            title: "Lista de Profesores",
            paging: true,
            sorting: true,
            actions: {
                listAction: "profesores/list"
            },
            toolbar: {
                items: [{
                    cssClass: 'buscador',
                    text: buscador
                }]
            },
            fields: {
                CodigoProfesor: {
                    key: true,
                    title: 'Código ',
                    width: '5%'
                },
                fullname: {
                    title: 'Nombre Completo ',
                    width: '37%'
                },
                Email: {
                    title: 'Email ',
                    width: '20%'
                },
                Telefono: {
                    title: 'Telefono',
                    width: '10%'
                }
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