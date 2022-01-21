@extends('layouts.app')

@section('content')
<div class="container justify-content-center">
    @foreach($posts as $post)
    <div class="card mt-5 mb-5 col-6 offset-3">
        <div class="row">
              <div class=""> 
                 <a href="/p/{{ $post->id }}">
                 <img src="/storage/{{ $post->image }}" alt="" class="w-100">
             </div>
                </a>
         </div>
    <div class="row pt-2 pb-3">
        <div class="col-8" style="margin-left:10px;"> 
            <div>
                <a style="text-decoration: none;" href="/profile/{{$post->user->id}}"></a>
                     <div class="d-flex align-items-center">
                        <div class="border-top">
                            <div class="d-flex align-items-center">
                         <like-button post-id="{{ $post->id }}" likes="{{ $likes }}" ></like-button>
                         <a style="text-decoration:none; margin-left:15px; margin-top:4px;" class="text-dark"href="/p/{{$post->id}}"><i class="far fa-comment fa-2x" ></i></a> 
                            </div>
                         <div>
                        <strong><p class="pl-1">{{ $post->likers->count() }} <button type="button" class="text-nowrap" style="border: none;
                            background-color: inherit; outline: none;" data-toggle="modal" data-target="#likes-modal">
                            likes
                        </button></p></strong><!--Broi haresvaniqta -->

                    </div>
                </div>              
              </div>    
                 <span style="font-weight: bold;"><a style=" text-decoration: none;" href="/profile/{{$post->user->id}}"><span class="text-dark"> {{$post->user->username}}</span></a> :</span>
                  {{$post->caption}}

                  <hr>


                  
                <form style="margin-left:10px;" action="/p/comment" enctype="multipart/form-data" method="post">
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
  @endforeach
</div>
@endsection
