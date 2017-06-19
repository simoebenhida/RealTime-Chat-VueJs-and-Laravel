@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                     <ul class="list-group">
                     @foreach($users as $user)
                <a href="{{ route('chat',$user->id) }}"><li class="list-group-item" >{{ $user->name }}</li></a>
                @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection