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
            title: "Lista de Escuelas Profesionales",
            paging: true,
            sorting: true,
            actions: {
                listAction: "escuelas/list"
            },
            toolbar: {
                items: [{
                    cssClass: 'buscador',
                    text: buscador
                }]
            },
            fields: {
                CodigoEscuela: {
                    key: true,
                    title: 'Código',
                    width: '5%'
                },
                facultad:{
                    title: 'Facultad',
                    width: '28%',
                    option: 'escuelas/getFacultades'
                },
                DescripcionEscuela: {
                    title: 'Escuela',
                    width: '28%'
                },
                DescripcionAlterna: {
                    title: 'Escuela en Ingles',
                    width: '20%'
                },
                Abreviatura: {
                    title: 'Abreviatura',
                    width: '37%'
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