@extends('moderator.dashboard.moderator_master')
@section('moderator')
    <div class="ml-4 mt-3">
        <h5>Name: {{ Auth::guard('moderator')->user()->name }}</h5>
        <h5>Email: {{ Auth::guard('moderator')->user()->email }}</h5>
    </div>
@endsection('moderator')
