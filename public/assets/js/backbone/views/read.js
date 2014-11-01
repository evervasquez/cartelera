Cartelera.Views.Read = Backbone.View.extend({
    el: ".email-wrapper",

    template: _.template($('#read-template').html()),

    events: {
        'click .action.comentario-add': 'comentario',
        'click .action.comunicado-like': 'like',
        'click .action.comunicado-notlike': 'notlike'
    },
    initialize: function () {
        this.render();
        this.registrarVisto();
    },

    //renderizamos la vista
    render: function () {
        $("#comunicados").hide();
        $(".email-toolbar-search").hide();
        var comunicado = this.model.toJSON();
        var html = this.template(comunicado);
        this.$el.append(html);
        return this;
    },

    redireccionar: function () {
        Cartelera.app.navigate('comunicado/' + this.model.get('id'), {trigger: true})
        return false;
    },

    //agregamos un nuevo comentario
    comentario: function () {
        var comentario = $("#comentario");
        var _id = $("#_id");
        bval = true;
        bval = bval && comentario.required();
        if (bval) {
            var datos = $("#new-comentario").serialize();
            $.ajax({
                type: "POST",
                url: 'comentario',
                data: datos + '&comunicado_id=' + _id.val(),
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                beforeSend: function () {
                },
                success: function (response) {

                    //instanciamos la colleción
                    this.mComentarios = new Cartelera.Collections.Comentarios();
                    this.mComentarios.add(new Cartelera.Models.Comentario({
                        id: response.data[0].id,
                        fullname: response.data[0].fullname,
                        diffhumanos: new moment(response.data[0].fechahora).locale('es').startOf('hour').fromNow(),
                        totalmegusta: response.data[0].totalmegusta,
                        totalnomegusta: response.data[0].totalnomegusta,
                        comentario: response.data[0].comentario,
                        user_id: response.data[0].user_id
                    }))

                    //enviamos el nuevo a la vista
                    new Cartelera.Views.ComentariosView({collection: this.mComentarios});
                }
            });
            comentario.val('');
            comentario.focus();
        }
        return false;
    },
    registrarVisto: function () {
        var _id = $("#_id");
        $.ajax({
            type: "POST",
            url: 'votoscomunicado',
            data: 'comunicado_id=' + _id.val(),
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            beforeSend: function () {
            },
            success: function (response) {
                if (response.Result == "OK") {

                } else {

                }
            }
        });
    },
    like: function () {
        var _id = $("#_id");
        $.ajax({
            type: "POST",
            url: 'votoscomunicado',
            data: 'comunicado_id=' + _id.val() + '&megusta=' + 1,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            beforeSend: function () {
            },
            success: function (response) {
                if (response.Result == "OK") {
                    var html = '<a class="likeado" style="text-decoration: none; color: #0000ff"><i class="im-thumbs-up2"></i>&nbsp;Te gusta</a>';
                    $(".append-megusta").html(html);
                    $(".append-nomegusta").remove();
                }
            }
        });
        return false;
    },
    notlike: function () {
        var _id = $("#_id");
        $.ajax({
            type: "POST",
            url: 'votoscomunicado',
            data: 'comunicado_id=' + _id.val() + '&nomegusta=' + 1,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            beforeSend: function () {
            },
            success: function (response) {
                if (response.Result == "OK") {
                    var html = '<a class="likeado" style="text-decoration: none; color: #ff0000"><i class="im-thumbs-down"></i>&nbsp;No te gusta</a>';
                    $(".append-nomegusta").html(html);
                    $(".append-megusta").remove();
                }
            }
        });
        return false;
    }
});
