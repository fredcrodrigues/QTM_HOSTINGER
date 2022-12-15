function loadScript() {
    $('#save').on('click', function(event) {
       
        var cidade = $('#cidade').val()
        var contato = $('#contato').val()
        var servico = $('#servicos').val()
        var atendimeto = $('#atendimento').val()
        var preferencias = $('#preferencias').val()
        var urgencia = $('#urgencia').val()
        var outros = $('#outra').val()
        var informacoes = $('#informacoes').val()

        var dados = {cidade: cidade, contato: contato, servico:servico, outros_servico: outros,
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
/* Ativar e Desativar Campo descrever Prática*/
$("#servicos").change(function (){
    
    const values = $(this).val()
  
    $.each(values, function(index, value){
  
        if(value == "Outros"){
            $('#outra').prop('disabled', false)
            $('#outra').selectpicker('refresh');
        }else{
            $('#outra').prop('disabled', true);
            $('#outra').selectpicker('refresh');
            
        }
       
    })
   
})


window.onload = loadScript;

$("#telefone").inputmask("(99)99999-9999");

