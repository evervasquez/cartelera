Cartelera.Router = Backbone.Router.extend({
    routes: {
        '': 'index',
        'comunicado/:id': 'comunicados',
        'write-menssage': 'writeMensaje'
    },

    initialize: function () {
        //this.Facultades = new Cartelera.Collections.Comunicados();
        Backbone.history.start();
    },
    index: function () {
        $(".email-write").remove();
        $(".read-message").remove();
        $.getJSON('comunicados').then(function (comunicados) {
            this.mComunicados = new Cartelera.Collections.Comunicados();
            console.log(comunicados);

            for (var comunicado in comunicados) {
                //agregamos al collection los modelos
                this.mComunicados.add(new Cartelera.Models.Comunicado({
                    id: comunicados[comunicado].id,
                    curso_id: comunicados[comunicado].CodigoCurso,
                    comunicado: comunicados[comunicado].comunicado,
                    titulo: comunicados[comunicado].titulo,
                    fechacreacion: new moment(comunicados[comunicado].created_at).locale('es').format('dddd'),
                    tipocomunicado: comunicados[comunicado].tipocomunicado_id,
                    totalmegusta: comunicados[comunicado].totalmegusta,
                    totalnomegusta: comunicados[comunicado].totalnomegusta,
                    urlarchivo: comunicados[comunicado].urlarchivo,
                    urlimagen: comunicados[comunicado].urlimagen,
                    user_id: comunicados[comunicado].user_id
                }));
            }

            new Cartelera.Views.ComunicadosView({collection: this.mComunicados});
        });

        $.getJSON('cursos').then(function (cursos) {
            this.mCursos = new Cartelera.Collections.Cursos();

            for (var curso in cursos['cursos']) {
                //agregamos al collection los modelos
                this.mCursos.add(new Cartelera.Models.Curso({
                    descripcion: cursos['cursos'][curso].DescripcionCurso.toLowerCase(),
                    CodigoCurso: cursos['cursos'][curso].CodigoCurso
                }));
            }

            new Cartelera.Views.CursosView({collection: this.mCursos});
        });
    },
    comunicados: function (id) {
        $(".email-write").remove();
        $(".read-message").remove();
        $.getJSON('comunicados/' + id).then(function (comunicados) {
            console.log(comunicados[0]);
            this.ModelComunidado = new Cartelera.Models.Comunicado({
                id: comunicados[0].id,
                curso: comunicados[0].curso,
                comunicado: comunicados[0].comunicado,
                titulo: comunicados[0].titulo,
                fechacreacion: new moment(comunicados[0].created_at).locale('es').format('llll'),
                totalmegusta: comunicados[0].totalmegusta,
                totalnomegusta: comunicados[0].totalnomegusta,
                urlarchivo1: comunicados[0].urlarchivo1,
                urlarchivo2: comunicados[0].urlarchivo2,
                urlimagen1: comunicados[0].urlimagen1,
                urlimagen2: comunicados[0].urlimagen2,
                usuario: comunicados[0].usuario
            })
            new Cartelera.Views.Read({model: this.ModelComunidado});
        });
    },
    writeMensaje: function () {
        $(".email-write").remove();
        $(".read-message").remove();

        $.getJSON('cursos').then(function (datos) {
            new Cartelera.Views.Write({collection:datos});
        });
    }
})