
$(document).ready(function($) {
    $("#telefone").inputmask("(99)99999-9999");
    $("#cpf_cnpj").inputmask("99.999.999/9999-99");
    $("#cep").inputmask("99999-999");

     // const select = $(".select2");
    // if (Object.keys(select).length !== 0) {
    //     select.select2({
    //         theme: "bootstrap4",
    //     });
    // }
    
    $("#save").on('click', function(event) {
        var $this = $(this);
        $this.button('loading');
    });

    $(document).on('change', '#estado', function() {
        //recuperando id do select de estado
        var id = $("#estado option:selected").val();
        //variavel que adiciona as opções
        var option = '';
        $.getJSON('/selecionar-cidade/' + id, function(dados) {
            //Atibuindo valores à variavel com os dados da consulta
            option += '<option value="">Selecione</option>';
            $.each(dados.cidades, function(i, cidade) {
                option += '<option value="' + cidade.id + '" >' + cidade.nome + '</option>';
            });
            //passando para o select de cidades
            $('#cidade').html(option).show();
        });
    });
});

var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('output');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
};