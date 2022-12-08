$(document).on('change', '#filtro', function() {
    //recuperando id do select de estado
    var filtro = $("#filtro option:selected").val();
    if (filtro == "nome") {
        $(".nome").show();
        $(".especialidade").hide();
        $(".cidade").hide();
        $(".botao").show();
    }else if (filtro == "especialidade") {
        $(".nome").hide();
        $(".especialidade").show();
        $(".cidade").hide();
        $(".botao").show();
    }else if (filtro == "cidade") {
        $(".nome").hide();
        $(".especialidade").hide();
        $(".cidade").show();
        $(".botao").show();
    }else if (filtro == "") {
        $(".nome").hide();
        $(".especialidade").hide();
        $(".cidade").hide();
        $(".botao").hide();
    }
});

$("#filter").on('click', function(event) {
    var $this = $(this);
    event.preventDefault();
        var dados = new FormData($("#profissionais")[0]);
        $.ajax({
            url: base_url + '/busca-profissionais',
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: dados,
            processData: false,
            contentType: false,
            beforeSend: function() {
                $this.button('loading');
            },
            success: function(resultado) {
                $this.button('reset');
                initialize(resultado);
               
            },
            error: function(resultado) {
                $this.button('reset');
                $('.erros').show();
                $('.erros').find('ul').text(""); //limpa a div para erros successivos
                $.each(resultado.responseJSON.errors, function(nome, mensagem) {
                    $('.erros').find("ul").append(mensagem + "</br>");
                });
            },
        });
       
    });


// When the user clicks the marker, an info window opens.
function initialize(filter) {

        const locations = [];
       
        filter.forEach(function(item){
            locations.push(["<p style='margin: 0; padding:0; padding: 2px;'>Nome: <b>"+item.nome+"</b></p><p style='margin: 0; padding:0; padding: 2px;'> Especialidade: <b>"+item.especialidade+"</b></p><br><a href='/agendamento/profissional/"+item.slug+"'  target='_blank' class='btn btn-transparent-deep-pink btn-rounded no-margin-right'>agendar</a><br>"
            ,item.latitude, item.longitude, 4]);
        });

        var map = new google.maps.Map(document.getElementById('mapa'), {
            zoom: 4,
            center: new google.maps.LatLng(-9.703156, -52.9512914),
            mapTypeId: google.maps.MapTypeId.ROADMAP
          });

          var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });
      
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
}

function loadScript() {
  var script = document.createElement('script');
  script.type = 'text/javascript';
  script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyB-VkwXzWViL2KVShqwcF8KmNmOaCi5J5Q&' +
      'callback=initialize';
  document.body.appendChild(script);
}

window.onload = loadScript;



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
