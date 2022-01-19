@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="post">
  @csrf <!--s tova pozvolqvame da se kachva post izbqgvame 419 error --> 
    
    <div class="row">
    <div class="col-8 offset-2">  
    <div class="row mb-3">

            <div class="row"> 
                <h1>Add New Post</h1>
            </div>
            <div class="form-group row"> 
                            <label for="caption" class="col-md-4 col-form-label">Post caption</label>
                                <input id="caption" type="text" class="form-control @error('caption')
                                 is-invalid @enderror" name="caption" value="{{ old('caption') }}"
                                  required autocomplete="caption" autofocus>

                                @error('caption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row">
                                <label for="image" class="col-md-4 col-form-label">Post Image</label>
                                <input type="file" class="form-control-file" id="image" name="image">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row pt-4 w-25">
                                <button class="btn btn-primary">Add New Post</button> 
                            </div>
                       
            </div>
        </div>
        </div>
</div>
    </form>
</div>
@endsection
