    <div class="form-group">
        {!!Form::label('title', 'Title') !!}
        {!!Form::text('title', null, ['class' => 'form-control span1']) !!}
    </div>

    <div class="form-group">
        {!!Form::label('title_ru', 'Title rus') !!}
        {!!Form::text('title_ru', null, ['class' => 'form-control span1']) !!}
    </div>

    <div class="form-group">
            {!!Form::label('text', 'Text') !!}
            {!!Form::textarea('text', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
            {!!Form::label('text_ru', 'Text rus') !!}
            {!!Form::textarea('text_ru', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
            {!!Form::label('published_at', 'Published') !!}
            {!!Form::input('date', 'published_at', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!!Form::submit('DO', ['class' => 'btn btn-primary form-control']) !!}
    </div>