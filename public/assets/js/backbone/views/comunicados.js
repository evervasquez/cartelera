Cartelera.Views.ComunicadosView =  Backbone.View.extend({
    el: $("#table-messages"),
    initialize: function(){
        this.listenTo(this.collection, "add", this.render(), this);
    },
    render: function () {
        $("#comunicados").show();
        $(".email-read").hide();
        $(".email-write").hide();
        $("#table-messages").html("");
        $(".email-toolbar-search").show();
        this.collection.each(function (comunicado) {
            //cargamos la vista individual
            var comunicadoView = new Cartelera.Views.Comunicado({model:comunicado});
            //this.$el.appendTo(facultadView.render().el);
            $("#table-messages").append(comunicadoView.render().el);
        },this);
    }
});