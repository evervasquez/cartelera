Cartelera.Collections.Comunicados = Backbone.Collection.extend({
    model: Cartelera.Models.Comunicado,
    sortField: "titulo",


    //meotodo de busqueda
    search : function(letters){
        if(letters === "") return this;
        //filtramos por regexp, i flag para ignore case (no distinguir lowercase/uppercase)
        var pattern = new RegExp(letters,'i');
        //iteramos la coll
        var filteredList = this.filter(function(data)
        {
            //return (pattern.test( data.get('titulo') + "  "+data.get('DescripcionCurso') ));
            //podríamos filtrar por editorial también
            return ( pattern.test(data.get('titulo')) || pattern.test(data.get('curso')) );// || pattern.test(data.get('editorial')) );
        });
        //create new coll con los elementos filtrados
        var coll = new Cartelera.Collections.Comunicados(filteredList);
        return coll;
    }
})