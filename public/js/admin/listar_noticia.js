$(document).ready(function($) {
    var tabela = $('#table_noticia').DataTable({
        ajax: base_url + '/noticias/list',
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
            { data: "data", name: "data" },
            { data: 'titulo', name: 'titulo' },
            { data: 'acao', name: 'acao' },
            { data: "criado", name: "criado", visible: false }
        ],
        language: { "url": "/plugins/datatables/traducao.json" }
    });


    $(document).on("click", ".btnExcluir", function() {
        deleteDialog({
            nomeModulo: "Notícias",
            rota: "noticias",
            idTable: "table_noticia",
            element: $(this),
        });
    });

});