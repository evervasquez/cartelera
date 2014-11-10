Cartelera.Views.Curso = Backbone.View.extend({
    tagName: 'tr',
    template: _.template($('#curso-template').html()),

    /*events: {
        'click .action.action-curso': 'redireccionar'
    },*/
    initialize:function(){
        this.listenTo(this.model, "add", this.render(), this);
    },
    render: function(){
        var curso = this.model.toJSON();
        var html = this.template(curso);
        this.$el.html(html);
        return this;
    }/*,

    redireccionar: function(){
        Cartelera.app.navigate('curso/'+this.model.get('CodigoCurso'),{trigger:true})
        return false;
    }*/
});