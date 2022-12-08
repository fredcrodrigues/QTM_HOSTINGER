$(document).ready(function($) {
    var tabela = $('#table_especialidade').DataTable({
        ajax: base_url + '/especialidade/show',
        scrollCollapse: true,
        responsive: true,
        paging: true,
        processing: true,
        serverSide: true,
        deferRender: true,
        searching: true,
        pageLength: 10,
        "order": [0, "desc"],
        columns: [
            { data: "titulo", name: "titulo" },
            { data: 'status', name: 'status' },
            { data: 'acao', name: 'acao' },
        ],
        language: { "url": "/plugins/datatables/traducao.json" }
    });
    $(document).on("click", ".btnExcluir", function() {
        deleteDialog({
            nomeModulo: "Especialidade",
            rota: "especialidade",
            idTable: "table_especialidade",
            element: $(this),
        });
    });
});