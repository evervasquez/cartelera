Cartelera.Views.Write = Backbone.View.extend({
    el: ".email-wrapper",
    template: _.template($('#write-template').html()),

    events: {
        'click .action-save': 'guardar'
    },
    initialize: function () {
        this.render();
    },
    render: function () {
        $(".email-toolbar-search").hide();
        $("#comunicados").hide();
        var datos = this.collection;
        var html = this.template(datos);
        this.$el.append(html);
        new Dropzone("form#my-dropzone", {
            maxFiles: 2
        });
        $('.datetimepicker').datetimepicker({
            dateFormat: 'dd-mm-yy'
        });
        return this;
    },

    redireccionar: function () {
        Cartelera.app.navigate('comunicado', {trigger: true})
        return false;
    },

    guardar: function () {
        bval = true;
        bval = bval && $("#fechainicio").required();
        bval = bval && $("#fechafin").required();
        bval = bval && $("#titulo").required();
        bval = bval && $("#comunicado").required();

        if (bval) {
            var datos = $("#formulario").serialize();
            //$("#formulario").submit();
            $.ajax({
                type: "POST",
                url: 'comunicados',
                data: datos,
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                beforeSend: function () {
                },
                success: function () {
                    Cartelera.app.navigate('',{trigger:true})
                }
            });
        }
        return false;
    }
});

