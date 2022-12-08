
$(document).ready(function($) {
    $("#telefone").inputmask("(99)99999-9999");
    $("#cpf_cnpj").inputmask("999.999.999-99");


    $("#save").on('click', function(event) {
        var $this = $(this);
        $this.button('loading');
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

