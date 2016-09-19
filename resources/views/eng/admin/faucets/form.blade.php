    <div class="form-group">
        {!!Form::label('site', 'WebSite') !!}
        {!!Form::text('site', NULL, ['class' => 'form-control span1']) !!}
    </div>

    <div class="form-group">
            {!!Form::label('refer', 'Referal link') !!}
            {!!Form::text('refer', NULL, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('script_id', 'Script') !!}
        {!! Form::select('script_id', $script, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('rewards', 'Rewards (sathosi)') !!}
        {!! Form::text('rewards', null, ['class' => 'form-control']) !!}
      </div>

    <div class="form-group">
        {!! Form::label('wait', 'Wait (sec)') !!}
        {!! Form::text('wait', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('period', 'Period reward (min)') !!}
        {!! Form::text('period', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
            {!! Form::label('captcha_id', 'Captcha') !!}
            {!! Form::select('captcha_id', $captcha, null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
            {!! Form::label('antibot', 'AntiBot') !!}
            {!! Form::text('antibot', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('register', 'Register') !!}
        {!! Form::checkbox('register', 1) !!}

        <div class="form-group right">
                {!! Form::label('paid', 'Paid') !!}
                {!! Form::checkbox('paid', 1, true) !!}

                {!! Form::label('published', 'Published') !!}
                {!! Form::checkbox('published', 1, true) !!}

                {!! Form::label('browser', 'Browser') !!}
                {!! Form::checkbox('browser', 1, true) !!}
        </div>
    </div>

    <div class="form-group">
        {!!Form::submit('DO', ['class' => 'btn btn-primary form-control']) !!}
    </div>
