$(document).ready(function($) {
    var table = $("#table").DataTable({
        ajax: base_url + "/videos/list",
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
            { "width": "20%", data: "link", name: "link" },
            { "width": "10%", data: "acao", name: "acao" }
        ],
        language: { url: "/plugins/datatables/traducao.json" }
    });
    
    $(document).on("click", ".btnExcluir", function() {
        deleteDialog({
            nomeModulo: "Video",
            rota: "videos",
            idTable: "table",
            element: $(this),
        });
    });
});
