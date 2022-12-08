
  function loadScript() {
    $.ajax({
        type: 'get',
        url: base_url +'/profissional-adm/consulta-modelo',
        success: function(data) {
            var options = {
                showActionButtons: false,
                formData: data,
                disableFields: [
                    'autocomplete',
                    'file',
                    'button',
                    'hidden',
                    'paragraph'
                ],
                controlConfig: {
                    'textarea.tinymce': {
                        paste_data_images: false,
                    },
                },
            };

            $fbTemplate = $(document.getElementById('fb-editor'));
            var formBuilder = $($fbTemplate).formBuilder(options);

            var funcao_edit = function() {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: base_url+'/profissional-adm/agendamento',
                    data: {formulario: formBuilder.actions.getData('json') },
                    success: function(data) {
                        if (data == "ok") {
                            swal("Sucesso", "Formulário Salvo.", "success");
                        } else {
                            swal("Atenção", "Aconteceu um problema, tente novamente mais tarde.", "warning");
                        }
                    },
                    error: function() {
                        swal("Atenção", "Aconteceu um problema, tente novamente mais tarde.", "warning");
                    },
                });
            };

            document.getElementById('save').addEventListener('click', funcao_edit);
        }
    });
  }
  
  window.onload = loadScript;

 