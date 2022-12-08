var loadFile01 = function(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('output_01');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
};

var loadFile02 = function(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('output_02');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
};