Cartelera.Router = Backbone.Router.extend({
    routes: {
        '': 'index',
        'comunicado/:id': 'comunicados',
        'write-menssage': 'writeMensaje'
    },

    initialize: function () {
        //this.Facultades = new Cartelera.Collections.Comunicados();
        $("#write-message").click(function () {
            Cartelera.app.navigate('write-menssage', {trigger: true})
            return false;
        });
        Backbone.history.start();
    },
    index: function () {
        $(".email-write").remove();
        $(".read-message").remove();
        $.getJSON('comunicados').then(function (comunicados) {
            this.mComunicados = new Cartelera.Collections.Comunicados();

            for (var comunicado in comunicados) {
                //agregamos al collection los modelos
                this.mComunicados.add(new Cartelera.Models.Comunicado({
                    id: comunicados[comunicado].id,
                    curso: comunicados[comunicado].DescripcionCurso,
                    comunicado: comunicados[comunicado].comunicado,
                    titulo: comunicados[comunicado].titulo,
                    fechacreacion: new moment(comunicados[comunicado].created_at).locale('es').format('dddd'),
                    totalmegusta: comunicados[comunicado].totalmegusta,
                    totalnomegusta: comunicados[comunicado].totalnomegusta
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

        //index comunicados
        $.getJSON('comunicados/' + id).then(function (comunicados) {
            for (var comunicado in comunicados['comunicado']) {
                var megusta = 0;
                var nomegusta = 0;
                if (comunicados['likes_comunicado'].length > 0) {
                    megusta = comunicados['likes_comunicado'][comunicado].megusta;
                    nomegusta = comunicados['likes_comunicado'][comunicado].nomegusta;
                }

                this.ModelComunidado = new Cartelera.Models.Comunicado({
                    id: comunicados['comunicado'][comunicado].id,
                    curso: comunicados['comunicado'][comunicado].curso,
                    comunicado: comunicados['comunicado'][comunicado].comunicado,
                    titulo: comunicados['comunicado'][comunicado].titulo,
                    fechacreacion: comunicados['comunicado'][comunicado].created_at,
                    totalmegusta: megusta,
                    totalnomegusta: nomegusta,
                    urlarchivo1: comunicados['comunicado'][comunicado].urlarchivo1,
                    urlarchivo2: comunicados['comunicado'][comunicado].urlarchivo2,
                    urlimagen1: comunicados['comunicado'][comunicado].urlimagen1,
                    urlimagen2: comunicados['comunicado'][comunicado].urlimagen2,
                    usuario: comunicados['comunicado'][comunicado].usuario
                })
            }
            new Cartelera.Views.Read({model: this.ModelComunidado});
            //end comunicado


            //recuperamos comentarios
            this.mComentarios = new Cartelera.Collections.Comentarios();
            for (var comentario in comunicados['comentarios']) {
                var megusta = 0;
                var nomegusta = 0;
                if (comunicados['comentarios'][comentario].like_comentario.length > 0) {
                    megusta =  comunicados['comentarios'][comentario].like_comentario[0].megusta;
                    nomegusta = comunicados['comentarios'][comentario].like_comentario[0].nomegusta;
                }
                //agregamos al collection los modelos
                this.mComentarios.add(new Cartelera.Models.Comentario({
                    id: comunicados['comentarios'][comentario].id,
                    fullname: comunicados['comentarios'][comentario].fullname,
                    diffhumanos: comunicados['comentarios'][comentario].fechahora,
                    megusta: megusta,
                    nomegusta: nomegusta,
                    totalmegusta: comunicados['comentarios'][comentario].totalmegusta,
                    totalnomegusta: comunicados['comentarios'][comentario].totalnomegusta,
                    comentario: comunicados['comentarios'][comentario].comentario,
                    user_id: comunicados['comentarios'][comentario].user_id
                }));

            }
            new Cartelera.Views.ComentariosView({collection: this.mComentarios});
        });

    },
    writeMensaje: function () {
        $(".email-write").remove();
        $(".read-message").remove();

        $.getJSON('cursos').then(function (datos) {
            new Cartelera.Views.Write({collection: datos});
        });
    }
})