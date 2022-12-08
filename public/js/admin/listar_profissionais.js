$(document).ready(function($) {
    var table = $("#table").DataTable({
        ajax: base_url + "/profissional-adm/list",
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
            { "width": "30%", data: "telefone", name: "telefone" },
            { "width": "40%", data: "especialidade", name: "especialidade" },
            { "width": "30%", data: "email", name: "email" },
            { "width": "30%", data: "acao", name: "acao" },
        ],
        language: { url: "/plugins/datatables/traducao.json" }
    });
    
});