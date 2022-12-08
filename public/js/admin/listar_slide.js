$(document).ready(function($) {
    var table = $("#table").DataTable({
        ajax: base_url + "/slide/list",
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
            { "width": "20%", data: "botao", name: "botao" },
            { "width": "30%", data: "link", name: "link" },
            { "width": "10%", data: "acao", name: "acao" }
        ],
        language: { url: "/plugins/datatables/traducao.json" }
    });

    $(document).on("click", ".btnExcluir", function() {
        deleteDialog({
            nomeModulo: "Slide",
            rota: "slide",
            idTable: "table",
            element: $(this),
        });
    });
});