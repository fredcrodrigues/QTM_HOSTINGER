$(document).ready(function($) {
    var table = $("#table_coworkings").DataTable({
        ajax: base_url + "/home/list-coworkings",
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
            { "width": "20%", data: "telefone", name: "telefone" },
            { "width": "30%", data: "email", name: "email" },
            { "width": "10%", data: "acao", name: "acao" },
        ],
        language: { url: "/plugins/datatables/traducao.json" }
    });

    var table_profissional = $("#table_profissionais").DataTable({
        ajax: base_url + "/home/list-profissionais",
        scrollCollapse: true,
        responsive: true,
        paging: true,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: true,
        "order": [0, "asc"],
        columns: [
            { "width": "30%", data: "nome", name: "nome" },
            { "width": "20%", data: "especialidade", name: "especialidade" },
            { "width": "20%", data: "telefone", name: "telefone" },
            { "width": "20%", data: "email", name: "email" },
            { "width": "10%", data: "acao", name: "acao" },
        ],
        language: { url: "/plugins/datatables/traducao.json" }
    });

    var table_agendamento = $("#table_agendamento").DataTable({
        ajax: base_url + "/home/list-agendamento",
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


