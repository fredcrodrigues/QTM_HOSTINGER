$(document).ready(function($) {
    var table = $("#table").DataTable({
        ajax: base_url + "/unidade/list",
        scrollCollapse: true,
        responsive: true,
        paging: true,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: true,
        "order": [0, "asc"],
        columns: [
            { "width": "20%", data: "titulo", name: "titulo" },
            { "width": "20%", data: "cidade", name: "cidade" },
            { "width": "15%", data: "email", name: "email" },
            { "width": "15%", data: "telefone", name: "telefone" },
            { "width": "10%", data: "whatsapp", name: "whatsapp" },
            { "width": "10%", data: "instagram", name: "instagram" },
            { "width": "10%", data: "acao", name: "acao" }
        ],
        language: { url: "/plugins/datatables/traducao.json" }
    });
    
    $(document).on("click", ".btnExcluir", function() {
        deleteDialog({
            nomeModulo: "Unidade",
            rota: "unidade",
            idTable: "table",
            element: $(this),
        });
    });
});
