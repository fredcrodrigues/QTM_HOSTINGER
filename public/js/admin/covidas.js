var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('output');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
};

$(document).ready(function($) {
    var table = $("#table").DataTable({
        ajax: base_url + "/covidas-adm/show",
        scrollCollapse: true,
        responsive: true,
        paging: true,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: true,
        "order": [0, "asc"],
        columns: [
            { "width": "40%", data: "titulo", name: "titulo" },
            { "width": "30%", data: "conteudo", name: "conteudo" },
            { "width": "30%", data: "acao", name: "acao" },
            { data: "criado", name: "criado", visible: false }
        ],
        language: { url: "/plugins/datatables/traducao.json" }
    });
    $(document).on("click", ".btnExcluir", function() {
        deleteDialog({
            nomeModulo: "Objetivo",
            rota: "covidas-adm",
            idTable: "table",
            element: $(this),
        });
    });
    $(document).on("click", "#btn-salvar-objetivo", function() {
        var data_objetivo = {
            titulo: $("#titulo").val(),
            conteudo_objetivo: $("#conteudo_objetivo").val()
        }
        
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: base_url+'/covidas-adm/store-objetivo',
            data: data_objetivo,
            success: function(data) {
                
                if (data == "ok") {
                    swal("Sucesso", "Objetivo Cadastrado", "success");
                    
                    table.ajax.reload();
                } else {
                    swal("Atenção", "Objetivo não pode ser cadastrado, tente novamente mais tarde.", "warning");
                }
            }
        });
         
        
    });
});