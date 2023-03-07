@extends('admin.layouts.main')
@section('content')


<div class="row justify-content-center">
  <div class="col-lg-10">
    <form action="{{route('category.update',[$category->id])}}" enctype="multipart/form-data" method="post"> @csrf
      {{ method_field('PUT') }}
      <div class="card mb-10">
        @if (Session::has('message'))
         <div class="alert alert-success">{{Session::get('message')}}</div>
          
        @endif
        <div class="card-header">
          <h6 class="m-0 font-weight-bold text-primary">Update Category</h6>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control  @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{$category->name}}" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea style="resize:none" name="description" class="form-control @error('description') is-invalid @enderror">{{$category->description}}</textarea>
            @error('description')
              <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group">
            <div class="custom-file">
              <label class="custom-file-label" for="image">Choose file</label>
            <input id="image" type="file" class="custom-file-input text-primary @error('image') is-invalid @enderror" name="image">
            <br>
            <img src="{{ Storage::url($category->image) }}" width="100" alt="{{$category->name}}">
            @error('image')
              <span class="invalid-feedback" role = "alert">
                <strong>{{$message}}</strong>
              </span>
            @enderror
            </div>
          
          </div>
          <br>
          <br>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
           
         
          

        </div>
      </div>
    </form>
  </div>
  
</div>





@endsection