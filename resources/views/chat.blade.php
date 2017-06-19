
@extends('layouts.app')

@section('content')
<div class="container">
<div class="col-md-6 col-md-offset-3">
    <h2 class="text-center">Envoyer Message à {{ $user->name }}</h2>
</div>
     <chat toid="{{ $user->id }}" uid="{{ Auth::user()->id }}"></chat>       
</div>
@endsection