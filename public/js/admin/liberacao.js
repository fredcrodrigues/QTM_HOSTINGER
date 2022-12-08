$("#btn-localizacao").on('click', function(event) {
    var id = $('#id').val();
    $.ajax({
        url: base_url + '/liberacao/localizacao/'+id,
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        processData: false,
        contentType: false,
        success: function(resultado) {
            const myObj = JSON.parse(resultado);
            $('#latitude').val(myObj['results'][0]['geometry']['location']['lat']);
            $('#longitude').val(myObj['results'][0]['geometry']['location']['lng']);
        },
        error: function(resultado) {
            alert('não foi possível encontrar localização, a latitude e longitude deverá ser inserida manualmente');
        },
    });
    
});