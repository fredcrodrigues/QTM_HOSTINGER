/*
function loadScript() {
    alert($("#tipo").val())
    $.ajax({
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {tipo:$("#tipo").val()},
        url: '/agendamento/consulta-modelo',
        success: function(data) {
            //var formRenderOptions = {
              //  formData: data
            //}
           
            //var formRenderInstance = $('#form').formRender(formRenderOptions);
            $('#save').on('click', function(event) {
                var dados = $('#formGeral');
                alert(JSON.stringify(dados))
                alert(data)
                $.ajax({
                    
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: base_url+'/agendamento/save',
                    beforeSend: function() {
                        swal({
                            title: 'Olá, ',
                            text: 'Aguarde um pouco, estamos enviando a sua solicitação...',
                            button: false,
                            onOpen: () => {
                                swal.showLoading()
                            }
                        })
                    },
                    success: function(resultado) {
                        swal.hideLoading();
                    },
                    data: {formulario_render: JSON.stringify(dados),
                        tipo:$("#tipo").val(),
                        cliente:$("#user_cliente").val(),
                        profissional_local:$("#user_profissional").val()},
                    success: function(data) {
                        if (data == "ok") {
                            swal("Sucesso", "Agendamento realizado, em breve entraremos em contato para confirmar os dados.", "success").then(function() {
                                window.location = "/agendamento";
                            });
                        } else {
                            swal("Atenção", "Aconteceu um problema, tente novamente mais tarde.", "warning");
                        }
                    },
                    error: function() {
                        swal("Atenção", "Aconteceu um problema, tente novamente mais tarde.", "warning");
                    },
                });
            });

            // document.getElementById('save').addEventListener('click', funcao_edit);
        }
    });
  }
*/
function loadScript() {
    $('#save').on('click', function(event) {
       
        var cidade = $('#cidade').val()
        var contato = $('#contato').val()
        var servico = $('#servicos').val()
        var atendimeto = $('#atendimento').val()
        var preferencias = $('#preferencias').val()
        var urgencia = $('#urgencia').val()
        var informacoes = $('#informacoes').val()

        var dados = {cidade: cidade, contato: contato, servico:servico,
            atendimeto: atendimeto, preferencias: preferencias, urgencia: urgencia, informacoes:informacoes
        }
       /* alert(JSON.stringify(dados))*/
 
        $.ajax({
            
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: base_url +'/agendamento/save',
            beforeSend: function() {
                swal({
                    title: 'Olá, ',
                    text: 'Aguarde um pouco, estamos enviando a sua solicitação...',
                    button: false,
                    onOpen: () => {
                        swal.showLoading()
                    }
                })
            },
            success: function(resultado) {
                swal.hideLoading();
            },
            data: {formulario_render: JSON.stringify(dados),
                tipo:$("#tipo").val(),
                cliente:$("#user_cliente").val(),
                profissional_local:$("#user_profissional").val()},
            success: function(data) {
                if (data == "ok") {
                    swal("Sucesso", "Agendamento realizado, em breve entraremos em contato para confirmar os dados.", "success").then(function() {
                        window.location = "/";
                    });
                } else {
                    swal("Atenção", "Aconteceu um problema, tente novamente mais tarde.", "warning");
                }
            },
            error: function() {
                swal("Atenção", "Aconteceu um problema, tente novamente mais tarde.", "warning");
            },
        });
    });
}
  
  window.onload = loadScript;

  $("#telefone").inputmask("(99)99999-9999");
 
