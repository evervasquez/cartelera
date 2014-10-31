Cartelera.Views.Read = Backbone.View.extend({
    el: ".email-wrapper",

    template: _.template($('#read-template').html()),

    events: {
        //'click .action.ver': 'redireccionar'
    },
    initialize:function(){
        //this.listenTo(this.model, "sync", this.render(), this);
        this.render();
    },
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
    }
});
