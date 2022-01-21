@extends('layouts.app')

@section('content')
<div class="container mt-5" style="margin-left: 20%">
    @foreach ($users as $user)
        <div class="d-flex mb-5" style="margin: auto">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100 mr-4" style="max-width: 60px" alt="">
            <div class="d-flex" style="flex-direction: column">
                <a style="text-decoration:none;" class="text-dark" href="/profile/{{ $user->id }}"><span>{{ $user->username }}</span></a>
                <p class="text-muted">{{ $user->profile->title }}</p>
            </div>
            <div>
            <!-- <follow-button user-id="{{ $user->id}}" follows="{{$follows}}"></follow-button>  -->
            </div>
        </div>
        <hr>
    @endforeach
</div>
@endsection