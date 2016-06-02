@extends('layouts.app')


@section('content')
    <div class="container" id='create_profile'>
        @if (count($errors) > 0)
            <div class="alert alert-danger profile-errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Profile</div>
                    <div class="panel-body">

                        {{ Form::open(array('url' => 'profiles')) }}
                        <div class="form-group">
                            {{ Form::label('nickname', 'Nickname') }}
                            {{ Form::text('nickname', Input::old('nickname'), ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('spoon_reason', 'Give people a reason spoon you:') }}
                            {{ Form::text('spoon_reason', Input::old('spoon_reason'), ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('fork_reason', 'Give people a reason not to fork you:') }}
                            {{ Form::text('fork_reason', Input::old('fork_reason'), ['class' => 'form-control']) }}
                        </div>
                        {{ Form::submit('Create Profile', ['class' => 'btn btn-primary', 'name'=>'create_profile']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
