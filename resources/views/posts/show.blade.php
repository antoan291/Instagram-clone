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



   <div class="border-top">
   <div class="d-flex align-items-center">
                         <like-button post-id="{{ $post->id }}" likes="{{ $likes }}" ></like-button>
                         <a style="text-decoration:none; margin-left:15px; margin-top:4px;" class="text-dark"href="/p/{{$post->id}}"><i class="far fa-comment fa-2x" ></i></a> 
                            </div>
                    
                    <div>
                        <strong><p class="pl-1">{{ $post->likers->count() }} <button type="button" class="text-nowrap" style="border: none;
                            background-color: inherit; outline: none;" data-toggle="modal" data-target="#likes-modal">
                            likes
                        </button></p></strong>
                    </div>
                </div>


   <hr>
    <div>
   <div class="comments overflow-auto">
                    @foreach ($comments as $comment)
                        <div class="d-flex mb-5 ">
                            <img src="{{ $comment->user->profile->profileImage() }}" alt="" class="rounded-circle w-100 mr-3" style="max-width: 40px">
                            <a href="/profile/{{ $comment->user->id }}" class="comm-user-link text-dark" style="font-weight: bold; margin-left:5px;  margin-right:5px; text-decoration:none;"><span class="comment-user">{{ $comment->user->username }}: </span> </a>
                            <p class="pl-2">{{ $comment->text }}</p>
                        </div>
                    @endforeach
                </div>
              
                </div>

                <form action="/p/comment" enctype="multipart/form-data" method="post">
                        @csrf
                            <div class="pt-4">
                                <div class="form-group row">
                                    <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">
                                    <input id="text" name="text" type="text" class="form-control @error('text') is-invalid @enderror" value="{{ old('text') }}"   placeholder="Add a comment..." autofocus>
                                    @error('text')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                       </form>
</div>
        </div>
      </div>
    </div>
  </div>    
</div>
@endsection
