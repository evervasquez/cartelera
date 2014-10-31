Cartelera.Views.CursosView =  Backbone.View.extend({
    el: $("#email-nav"),
    initialize: function(){
        this.listenTo(this.collection, "add", this.render(), this);
    },
    render: function () {
        $("#email-nav").html("");
        this.collection.each(function (curso) {
            //cargamos la vista individual
            var cursoView = new Cartelera.Views.Curso({model:curso});
            //this.$el.appendTo(facultadView.render().el);
            $("#email-nav").append(cursoView.render().el);
        },this);
    }
});
