$(document).ready(function(){

    var btn = document.getElementById('btn');
    var clipboard = new Clipboard(btn);
    clipboard.on('success', function(e) {
        console.log(e);
        $('#btn').removeClass('btn-warning');
        $('#btn').addClass('btn-success');
    });
    clipboard.on('error', function(e) {
        console.log(e);
        $('#btn').removeClass('btn-warning');
        $('#btn').addClass('btn-error');
    });

}); 