$(document).ready(function(){

    // Active Navigation Bar
    var url = window.location;
    $('ul.nav a[href="'+ url + '"]').parent().addClass('active');

    // Delete confirm
    $('.delete-confirm').click(function(event) {
        var result = confirm("Delete this faucet?");
        if(result) return true;
        else event.preventDefault();
    });

    $('#msg-exit').click(function(){
        $('#message').hide();
    });
    setTimeout( function() {
        $('#message').hide()
    }, 10000);

    // Completed faucets
    function setTimerByTime(timer,btn){
        var time = timer.text().split(':');

        var secInterval = setInterval(function(){
            if(time[2]==0 && (time[0]!=0 || time[1]!=0)) {
                time[2]=60;
                if(time[1]==0 && time[0]!=0) {
                    time[1]=60;
                    time[0]--;
                }
                time[1]--;
            }

            time[2]--;
            timer.html(time[0]+':'+time[1]+':'+time[2]);
            if(time[0]==0 && time[1]==0 && time[2]==0) {
                clearInterval(secInterval);
                timer.html(btn);
            }
        },1000);
    }

    var completed = $('#completed').text();
    if(completed!='') {
        var arr = completed.split(',');
        var countArr = arr.length;
        for (var i = 0; i < countArr; i++) {
            var tmp = arr[i].split('|');
            var btn = $('#site-' + tmp[0] + ' .btn-move').hide();
            var time = $('#site-' + tmp[0] + ' .set-timer').html(getTimeByMin(tmp[1])).show();
            setTimerByTime(time,btn);

            $('#site-' + tmp[0] +' .unset-timer').show();
        }
        $('#time').text();
    }

    $('.unset-timer').click(function(){
        var unset = $(this);
        var siteId = $(this).data('site')
        $.get($(this).data('href'),function(data,status){
            if(data=='OK') {
                $('#site-' + siteId + ' .set-timer').hide();
                $('#site-' + siteId + ' .unset-timer').hide();
                $('#site-' + siteId + ' .btn-move').show();
            }
        });
    });

    function getTimeByMin(min) {
        var hour = Math.floor(min / 60);
        var minute = min - hour*60;
        return  hour+':'+minute+':59';
    }

    // end completed faucets

    $('.table-striped tbody tr').hover(
        function(){
            $(this).addClass('tr-hover');
        },
        function(){
            $(this).removeClass('tr-hover');
        }
    );

    // faq blocks
    $('.faq .faq-title').click(function(e){
        $(this).parent().children('.faq-text').slideToggle();
    });


    // favorites
    var favorite = $('#favorite').text();
    if(favorite!='') {
        var arr = favorite.split(',');
        var countArr = arr.length;
        for (var i = 0; i < countArr; i++) {
            $('#follow-' + arr[i] + ' .yes').hide();
            $('#follow-' + arr[i] + ' .no').show();
        }
    }
    $('.yes').click(function(){
        var yes = $(this);
        yes.hide();
        $.get($(this).data('href'),function(data,status) {
            if (data == 'OK') {
                $('#follow-' + yes.data('id') + ' .no').show();
            }
        });
    });

    $('.no').click(function(){
        var no = $(this);
        no.hide();
        $.get($(this).data('href'),function(data,status) {
            if (data == 'OK') {
                $('#follow-' + no.data('id') + ' .yes').show();
            }
        });
    });

});