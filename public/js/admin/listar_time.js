$(document).ready(function($) {
    var table = $("#table").DataTable({
        ajax: base_url + "/time-qtm/show",
        scrollCollapse: true,
        responsive: true,
        paging: true,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: true,
        "order": [0, "asc"],
        columns: [
            { "width": "40%", data: "nome", name: "nome" },
            { "width": "30%", data: "cargo", name: "cargo" },
            { "width": "30%", data: "acao", name: "acao" },
            { data: "criado", name: "criado", visible: false }
        ],
        language: { url: "/plugins/datatables/traducao.json" }
    });
    $(document).on("click", ".btnExcluir", function() {
        deleteDialog({
            nomeModulo: "Time",
            rota: "time-qtm",
            idTable: "table",
            element: $(this),
        });
    });
});