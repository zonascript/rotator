{!! Html::style('css/lib/bootstrap.css') !!}
{!! Html::style('css/admin/login.css') !!}


<div id="login-form">
{!! Form::open(array('url' => 'admin/auth', 'method' => 'post')) !!}

    <div class="form-group">
        {!!Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group hide">
        {!!Form::submit('Login', ['class' => 'btn btn-primary form-control']) !!}
    </div>
{!! Form::close() !!}
</div>

