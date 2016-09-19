$(document).ready(function(){

    $.ajaxSetup({headers: {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}});

    var urlVote = $('#vote').data('url');
    var faucetId = $('#vote').data('faucet');

    $('#like').click(function(){
        $.post( urlVote, { 'faucet_id' : faucetId, 'vote' : '1'}, function(data){
            $('#vote').html('Thank you');
            $('.votes').html('');
            setTimeout(function(){
                $('#vote').html('');
            },5000);
        });
    });

    $('#dislike').click(function(){
        $.post( urlVote, { 'faucet_id' : faucetId, 'vote' : '0'}, function(data){
            $('#vote').html('Thank you');
            $('.votes').html('');
            setTimeout(function(){
                $('#vote').html('');
            },5000);
        });
    });

    $('.bankrupt').click(function(){
        var urlB = $(this).data('url');
        var idF = $(this).data('id');
        $.post( urlB, { 'faucet_id' : idF}, function(data){
            // alert(data)
        });

        $(this).hide();
    });

});
