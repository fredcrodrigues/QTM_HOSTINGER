$(document).ready(function($) {
    $("#save").on('click', function(event) {
        var $this = $(this);
        event.preventDefault();
            var dados = new FormData($("#contato")[0]);
            $.ajax({
                url: base_url + '/contato/save',
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: dados,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $this.button('loading');
                },
                success: function(resultado) {
                    $this.button('reset');
                    if (resultado == "ok") {
                        swal("Sucesso!!", "Recebemos a sua mensagem, em breve a equipe QTM entrará em contato.", "success").then((value) => {
                        });
                    } else {
                        swal("Atenção", "Aconteceu um problema, tente novamente mais tarde.", "warning");
                    }
                },
                error: function(resultado) {
                    $this.button('reset');
                    swal("Atenção", "Para enviar a mensagem é preciso preencher todos os campos.", "warning");
                },
            });
        });
    });