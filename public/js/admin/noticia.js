var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('output');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
};


$(document).ready(function($) {

    var pathname = window.location.pathname;

    if (pathname == "/area-restrita/noticias/create") {
        var today = new Date();
        document.getElementById("data").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
    }
    $('.textarea').summernote({
        height: 500,
        callbacks: {
            onImageUpload: function(files, editor, $editable) {
                uploadImage(files[0], editor, $editable);
            },
            onMediaDelete: function(target) {
                deleteFile(target[0].src);
            }
        }
    });

    function uploadImage(file, editor, welEditable) {
        var data = new FormData();
        data.append("file", file);
        $.ajax({
            url: base_url + '/noticias/inserir-imagem-editor',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: "post",
            success: function(data) {
                $('#conteudo').summernote("insertImage", "/editor-noticia/" + data);
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function deleteFile(file) {
        var local = file.replace(base_url, '');
        $.ajax({
            url: base_url + '/noticias/remover-imagem-editor',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { local: local },
            type: "post",
            dataType: 'json',
            cache: false,
            success: function(data) {},
            error: function(data) {
                // console.log(data);
            }
        });
    }
})
$(document).ready(function($) {
    const select = $(".select2");
    if (Object.keys(select).length !== 0) {
        select.select2({
            theme: "bootstrap4",
        });
    }
});


var uploadedDocumentMap = {}
Dropzone.autoDiscover = false;

//gerenciar a galeria de imagens
var galeria = new Dropzone('#imagem_noticia', {
    url: base_url + '/funcao-geral/Noticia/carregar-imagem',
    maxFilesize: 3, // MB
    acceptedFiles: 'image/*',
    maxFiles: '1',
    addRemoveLinks: true,
    dictFileTooBig: "Essa imagem é maior do que 10MB",
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    dictDefaultMessage: '<div class="text-center mb-3"><i class="fa fa-camera text-warning" style="font-size:50px"></i></div>Click ou arraste a imagem.',
    success: function(file, response) {
        $('form').append('<input type="hidden" name="imagem_noticia" value="' + response.name + '">')
        uploadedDocumentMap[file.name] = response.name
    },
    removedfile: function(file) {
        var id_noticia = $("#noticia").val();
        var name = uploadedDocumentMap[file.name]

        $.ajax({
            type: 'post',
            url: base_url + '/funcao-geral/Noticia/excluir-imagem',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { "imagem": name, "id_imagem": file.id, "id": id_noticia },
            success: function(data) {
                if (data.error) {
                    Swal.fire("Atenção", "Exclusão cancelada, tente novamente mais tarde.", "error");
                } else {
                    Swal.fire("Sucesso", "Imagem removida com sucesso.", "success");
                    console.log(uploadedDocumentMap[file.name]);
                    $('form').find('input[name="document[]"][value="' + data.imagem + '"]').remove();
                    file.previewElement.remove();
                }
            },
            error: function(data) {
                swal("Atenção", "Exclusão cancelada, tente novamente mais tarde.", "error");
            },
        });
    },
    init: function() {
        var id_noticia = $("#noticia").val();
        thisDropzone = this;
        if (id_noticia) {
            $.ajax({
                type: 'post',
                url: base_url + '/funcao-geral/Noticia/noticia/mostrar-imagem',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { "id": id_noticia },
                success: function(data) {
                    $.each(data, function(key, value) {
                        let mockFile_galeria = { name: value.file_name, size: value.size, id: value.id };
                        galeria.displayExistingFile(mockFile_galeria, "/noticia/" + value.id + "/" + value.file_name);
                        $('form').append('<input type="hidden" name="imagem_noticia" value="' + value.file_name + '">')
                    });
                },
                error: function(data) {
                    swal("Atenção", "Exclusão cancelada, tente novamente mais tarde. teste", "error");
                },
            });
        }
        thisDropzone.on("complete", function(file) {
            $(".dz-remove").html('<button type="button" class="btn btn-danger btn-sm"> <i class="fa fa-fw fa-trash"></i>Remover</button>');
        });
    }
});