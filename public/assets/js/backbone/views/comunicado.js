Cartelera.Views.Comunicado = Backbone.View.extend({
    tagName: 'tr',
    template: _.template($('#comunicado-template').html()),

    events: {
        'click .action.ver': 'redireccionar'
    },
    initialize: function () {
        this.listenTo(this.model, "change", this.render(), this);
    },
    render: function () {
        var comunicado = this.model.toJSON();
        var html = this.template(comunicado);
        this.$el.html(html);
        return this;
    },

    redireccionar: function () {
        Cartelera.app.navigate('comunicado/' + this.model.get('id'), {trigger: true})
        return false;
    }
});