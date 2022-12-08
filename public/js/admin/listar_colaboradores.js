$(document).ready(function($) {
    var table = $("#table").DataTable({
        ajax: base_url + "/colaborador/list",
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
            { "width": "30%", data: "email", name: "email" },
            { "width": "30%", data: "acao", name: "acao" },
        ],
        language: { url: "/plugins/datatables/traducao.json" }
    });
    var table_inativo = $("#table_inativo").DataTable({
        ajax: base_url + "/colaborador/list-inativo",
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
            { "width": "30%", data: "email", name: "email" },
            { "width": "30%", data: "acao", name: "acao" },
        ],
        language: { url: "/plugins/datatables/traducao.json" }
    });
    $(document).on("click", ".btnExcluir", function() {
        deleteDialog({
            nomeModulo: "Colaborador",
            rota: "colaborador",
            idTable: "table",
            element: $(this),
        });
    });
    $(document).on("click", ".btnReativar", function() {
        reativarDialog({
            nomeModulo: "Colaborador",
            rota: "colaborador",
            idTable: "table_inativo",
            element: $(this),
        });
    });
});