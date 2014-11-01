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
        alert('me gusta');
        return false;
    },
    notlike: function () {
        alert('no me gusta');
        return false;
    }
});