@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
  <div class="col-6"> 
  <img src="/storage/{{ $post->image }}" alt="" class="w-100">
</div>

<div class="col-4">
<div>
  <div class="d-flex align-items-baseline">
       <div class="pr-3">
    <img src="{{$post->user->profile->profileImage() }}" alt="" class="rounded-circle  w-100" style="max-width:45px;">
      </div>
        <div style="font-weight: bold; margin-left:5px ">
        <a style="text-decoration: none;" href="/profile/{{$post->user->id}}">
        <span class="text-dark"> {{$post->user->username}}</span></a>
       <a href="" style="padding-left:15px; text-decoration:none">Follow</a> 
      </div>

    </div>
</div>
  <hr>
  <p><span style="font-weight: bold; margin-left:5px"><a style="text-decoration: none;" href="/profile/{{$post->user->id}}"><span class="text-dark"> {{$post->user->username}}</span></a> :</span>
   {{$post->caption}}

              
                </div>
        </div>
      </div>
    </div>
  </div>    
</div>
@endsection
