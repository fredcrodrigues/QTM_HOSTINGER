$(document).ready(function($) {
    var table = $("#table").DataTable({
        ajax: base_url + "/banner/show",
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
            { "width": "30%", data: "link", name: "link" },
            { "width": "30%", data: "acao", name: "acao" },
            { data: "criado", name: "criado", visible: false }
        ],
        language: { url: "/plugins/datatables/traducao.json" }
    });
    $(document).on("click", ".btnExcluir", function() {
        deleteDialog({
            nomeModulo: "Banner",
            rota: "banner",
            idTable: "table",
            element: $(this),
        });
    });
});