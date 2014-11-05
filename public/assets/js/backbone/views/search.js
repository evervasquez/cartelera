Cartelera.Views.SearchView = Backbone.View.extend({
    el: "#search-comunicado",
    template: _.template($('#search-template').html()),

    events: {
        'keyup #search': 'search'
    },
    initialize: function () {
        this.render();

        //enviamos los modelos
        this.ComunicadoList = new Cartelera.Collections.Comunicados(this.collection.models);

        //iniciamos la vista de inicio
        new Cartelera.Views.ComunicadosView({collection: this.collection});
        this.activeList = null;
        $('#search').focus();
    },
    //renderizamos la vista
    render: function () {
        if (!$("#search").length) {
            var html = this.template();
            this.$el.append(html);
        }
        return this;
    },

    search: function (e) {
        var letters = $("#search").val();
        this.activeList = this.ComunicadoList.search(letters);

        new Cartelera.Views.ComunicadosView({collection: this.activeList});

    }
});
