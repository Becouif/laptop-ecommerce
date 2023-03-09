@extends('admin.layouts.main')

@section('content')

<nav aria-label="breadcrumb">
  <h1 class="h3 mb-0 ml-4 text-gray-800">SubCategory</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('category.index')}}">Category</a></li>
    <li class="breadcrumb-item active" aria-current="page">SubCategory</li>
  </ol>
</nav>


<div class="row justify-content-center">
  <div class="col-lg-10">
    <form action="{{route('subcategory.store')}}" enctype="multipart/form-data" method="post"> @csrf
      <div class="card mb-6">
        @if (Session::has('message'))
          <div class="alert alert-success">{{Session::get('message')}}</div>
          
        @endif
        <div class="card-header">
          <h6 class="m-0 font-weight-bold text-primary">Create SubCategory</h6>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control  @error('name') is-invalid @enderror" type="text" name="name" id="name" placeholder="Enter name of subcategory" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          
          <div class="form-group">
            <div class="custom-file">
              <label class="" for="image">Choose Category</label>
              <select  class="form-control @error('category') is-invalid @enderror" name="category" id="category">
                <option value="">Select category</option>
              @foreach (App\Models\Category::all() as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
                
              </select>
            @error('category')
              <span class="invalid-feedback" role = "alert">
                <strong>{{$message}}</strong>
              </span>
            @enderror
            </div>
          
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>

        </div>
      </div>
    </form>
  </div>
  
</div>





@endsection