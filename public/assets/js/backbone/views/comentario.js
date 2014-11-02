Cartelera.Views.Comentario = Backbone.View.extend({
    tagName: 'li',
    template: _.template($('#comentario-template').html()),

    events: {
        'click .action.comentario-like': 'like',
        'click .action.comentario-notlike': 'notlike'
    },
    initialize: function () {
        this.listenTo(this.model, "change", this.render, this);
    },
    render: function () {
        var comentario = this.model.toJSON();
        var html = this.template(comentario);
        this.$el.html(html);
        return this;
    },
    like: function () {
        var _id = this.model.get('id');
        var megusta = this.model.get('totalmegusta');
        var totalmegusta = this.model.get('totalmegusta');
        var modelo = this.model;
        $.ajax({
            type: "POST",
            url: 'votoscomentario',
            data: 'comentario_id=' + _id + '&megusta=' + 1,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            beforeSend: function () {
            },
            success: function (response) {
                if (response.Result == "OK") {
                    modelo.set({
                        megusta: megusta +1,
                        totalmegusta: totalmegusta + 1
                    });
                }
            }
        });
        return false;
    },
    notlike: function () {
        var _id = this.model.get('id');
        var nomegusta = this.model.get('totalnomegusta');
        var totalnomegusta = this.model.get('totalnomegusta');
        var modelo = this.model;
        $.ajax({
            type: "POST",
            url: 'votoscomentario',
            data: 'comentario_id=' + _id + '&nomegusta=' + 1,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            beforeSend: function () {
            },
            success: function (response) {
                if (response.Result == "OK") {
                    modelo.set({
                        nomegusta: nomegusta + 1,
                        totalnomegusta: totalnomegusta +1
                    });
                }
            }
        });
        return false;
    }
});