function loadScript() {
    $.ajax({
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {agendamento:$("#agendamento").val()},
        url: base_url +'/agendamento/formulario-cliente',
        success: function(data) {
            var formRenderOptions = {
                formData: data
            }
            var formRenderInstance = $('#form-render').formRender(formRenderOptions);
        }
    });
  }
  
  window.onload = loadScript;

 