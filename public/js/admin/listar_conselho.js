$(document).ready(function($) {
    var tabela = $('#table_conselho').DataTable({
        ajax: base_url + '/conselho/show',
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
            nomeModulo: "Conselho",
            rota: "conselho",
            idTable: "table_conselho",
            element: $(this),
        });
    });
});