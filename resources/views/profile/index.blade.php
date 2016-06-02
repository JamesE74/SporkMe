@extends('layouts.app')


@section('content')
    <div class="container" id='profile_list'>


        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

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
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
