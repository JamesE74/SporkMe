@extends('layouts.app')


@section('content')
    <div class="container" id='profile_list'>
        @if(!$user->profile)
            <div class="row">
                <div class="alert alert-warning text-center">
                    <p><strong>You have not created a profile. How do you expect to get spooned?</strong></p>
                    <div><a href="{{route('profiles.create')}}">Click here to start getting spooned!</a></div>
                </div>
            </div>
        @endif
        @include('flash::message')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile List</div>
                    <div class="panel-body">
                        @foreach ($profiles as $profile)
                            <div class="user-profile">
                                <div class="header">{{ $profile->nickname }}</div>
                                <ul>
                                    <li><strong>Reason to spoon: </strong> {{ $profile->spoon_reason }}</li>
                                    <li><strong>Reason not to fork: </strong> {{ $profile->fork_reason }}</li>
                                </ul>
                                {{ Form::open(array('url' => 'sporks')) }}
                                {{ Form::hidden('profile_id', $profile->id) }}
                                {{ Form::hidden('spork_type_id', 1) }}
                                {{Form::button('<i class="fa fa-spoon"></i> Spoon! ('.$profile->spoons.')', ['class' => 'btn','type'=> 'submit'])}}
                                {{ Form::close() }}

                                {{ Form::open(array('url' => 'sporks')) }}
                                {{ Form::hidden('profile_id', $profile->id) }}
                                {{ Form::hidden('spork_type_id', 2) }}
                                {{Form::button('<i class="fa fa-plug"></i> Fork! ('.$profile->forks.')', ['class' => 'btn', 'type'=> 'submit'])}}
                                {{ Form::close() }}

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
