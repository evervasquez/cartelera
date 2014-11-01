Cartelera.Views.Read = Backbone.View.extend({
    el: ".email-wrapper",

    template: _.template($('#read-template').html()),

    events: {
        'click .action.comentario-add': 'comentario',
        'click .action.comunicado-like': 'like',
        'click .action.comunicado-notlike': 'notlike'
    },
    initialize:function(){
        //this.listenTo(this.model, "add", this.render(), this);
        this.render();
    },

    //renderizamos la vista
    render: function(){
        $("#comunicados").hide();
        $(".email-toolbar-search").hide();
        var comunicado = this.model.toJSON();
        var html = this.template(comunicado);
        this.$el.append(html);
        return this;
    },

    redireccionar: function(){
        Cartelera.app.navigate('comunicado/'+this.model.get('id'),{trigger:true})
        return false;
    },

    //agregamos un nuevo comentario
    comentario: function(){
        var comentario = $("#comentario");
        var _id = $("#_id");
        bval = true;
        bval = bval && comentario.required();
        if (bval) {
            var datos = $("#new-comentario").serialize();
            $.ajax({
                type: "POST",
                url: 'comentario',
                data: datos+'&comunicado_id='+_id.val(),
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
    like: function()
    {
        alert('me gusta');
        return false;
    },
    notlike: function()
    {
        alert('no me gusta');
        return false;
    }
});
