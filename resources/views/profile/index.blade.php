@extends('layouts.front2')

@section('content')
    <div class="container">
       @foreach($posts as $profile)
  <p>{{ $profile->name }}</p>
  <p>{{ $profile->gender }}</p>
@endforeach
    </div>
@endsection