$(document).ready(function($) {
    var table = $("#table").DataTable({
        ajax: base_url + "/depoimentos/list",
        scrollCollapse: true,
        responsive: true,
        paging: true,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: true,
        "order": [0, "asc"],
        columns: [
            { "width": "20%", data: "nome", name: "nome" },
            { "width": "10%", data: "acao", name: "acao" }
        ],
        language: { url: "/plugins/datatables/traducao.json" }
    });
    
    $(document).on("click", ".btnExcluir", function() {
        deleteDialog({
            nomeModulo: "Depoimento",
            rota: "depoimentos",
            idTable: "table",
            element: $(this),
        });
    });
});
