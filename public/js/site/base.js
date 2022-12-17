//Proteção da aplicação contra ataques de falsificação de solicitações entre sites (CSRF).
$(document).ready(function($) {
    console.log("testa")
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
});
console.log("testa")
var base_url = "http://" + window.location.host.toString();
var base_url = location.protocol + "//" + window.location.host.toString();