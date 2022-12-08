$(document).ready(function($) {
    var table = $("#table").DataTable({
        ajax: base_url + "/servico-oferecido/show",
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
            nomeModulo: "Serviço",
            rota: "servico-oferecido",
            idTable: "table",
            element: $(this),
        });
    });
});