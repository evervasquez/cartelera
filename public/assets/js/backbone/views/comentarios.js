Cartelera.Views.ComentariosView =  Backbone.View.extend({
    el: $("#comentarios"),
    initialize: function(){
        //renderizamos los comentarios
        this.render();

        /*
        registramos el evento cuando agregamos se dispara addOne
         */
        this.listenTo(this.collection, "add", this.addOne, this);
    },

    render: function () {
        this.collection.forEach(this.addOne, this);
    },
    addOne: function (comentario) {
        var comentarioView = new Cartelera.Views.Comentario({model:comentario});
        $("#comentarios").prepend(comentarioView.render().el);
    }

});
