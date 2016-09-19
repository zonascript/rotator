@if(Session::get('message'))
    <div id="message">

        <div id="msg-title">
            Message
            <div id="msg-exit"> [X] </div>
        </div>

        <div id="msg-text"> {!! Session::get('message') !!} </div>

    </div>
@endif