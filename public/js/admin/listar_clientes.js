$(document).ready(function($) {
    var table = $("#table").DataTable({
        ajax: base_url + "/cliente-adm/list",
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
            { "width": "30%", data: "email", name: "email" },
            { "width": "30%", data: "acao", name: "acao" },
            { data: "criado", name: "criado", visible: false }
        ],
        language: { url: "/plugins/datatables/traducao.json" }
    });
    
});