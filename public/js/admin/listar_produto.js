$(document).ready(function($) {
    var table = $("#table").DataTable({
        ajax: base_url + "/produto/show",
        scrollCollapse: true,
        responsive: true,
        paging: true,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: true,
        "order": [0, "asc"],
        columns: [
            { "width": "90%", data: "titulo", name: "titulo" },
            { "width": "10%", data: "acao", name: "acao" }
        ],
        language: { url: "/plugins/datatables/traducao.json" }
    });

    $(document).on("click", ".btnExcluir", function() {
        deleteDialog({
            nomeModulo: "Produto",
            rota: "produto",
            idTable: "table",
            element: $(this),
        });
    });
});