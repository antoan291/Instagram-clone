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
                 <p>   
            <a style="text-decoration: none;" href="/profile/{{$post->user->id}}"></a>
            <p>
              <div>

              </div>    
                 <span style="font-weight: bold;"><a style=" text-decoration: none;" href="/profile/{{$post->user->id}}"><span class="text-dark"> {{$post->user->username}}</span></a> :</span>
                  {{$post->caption}}
<!-- 
                  <div class="d-flex justify-content-between align-items-baseline" style="margin-top:20px; padding-bottom:30px;">
                
                  <textarea class="form-control form-control-lg col-md-2" style="margin-right:10px;"  type="text" placeholder="Add comment"></textarea>
                

                  <button class="btn btn-primary " >Post</button> 
                  </div> -->

          
            </div>
        </div>
      </div>
</div>
  @endforeach
</div>
@endsection
