$(document).ready(function($) {
    var table_agendamento = $("#table").DataTable({
        ajax: base_url + "/agendamento/list",
        scrollCollapse: true,
        responsive: true,
        paging: true,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: true,
        "order": [2, "asc"],
        columns: [
            { "width": "10%", data: "solicitacao", name: "solicitacao" },
            { "width": "40%", data: "cliente", name: "cliente" },
            { "width": "10%", data: "tipo", name: "tipo" },
            { "width": "30%", data: "profissional_local", name: "profissional_local" },
            { "width": "10%", data: "acao", name: "acao" },
        ],
        language: { url: "/plugins/datatables/traducao.json" }
    });
    
});


