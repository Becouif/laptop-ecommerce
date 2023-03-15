@extends('admin.layouts.main')
@section('content')
<!-- breadcrumbs  -->
<nav aria-label="breadcrumb">
  <h1 class="h3 mb-0 ml-4 text-gray-800">Products</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Product</li>
  </ol>
</nav>

  <!-- DataTable with Hover -->
        <div id="page-top">
          <div id="wrapper">
         
          <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               
                  <h6 class="m-0 font-weight-bold text-primary">Product table</h6>
                </div>
                <div class="table-responsive p-3">
                @if (Session::has('message'))
                  <p class="alert alert-primary">{{Session::get('message')}}</p>
                @endif
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead>
                      <tr>
                        <th>no</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>image</th>
                        <th>Price</th>
                        <th>Additional_info</th>
                        <th>Category</th>
                        <th>Action</th>
                        <th>-</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                      @if (count($products)>0)
                        
                      
                      @foreach ($products as $key=>$product)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{$product->name}}</td>
                          <!-- to display summernote words  -->
                          <td>{!!$product->description!!}</td>
                          <td><img src="{{Storage::url($product->image)}}" width="100" alt="{{$product->name}}"></td>
                          
                          <td>${{$product->price}}</td>
                          <td>{!!$product->additional_info!!}</td>
                          <td>{{$product->category->name}}</td>
                          <td><a href="{{route('product.edit',[$product->id])}}"><button class="btn btn-success">Edit</button></a></td>
                          <td><form action="{{route('product.destroy',[$product->id])}}" method="post" onsubmit="return confirmDelete()">@csrf
                            {{ method_field('DELETE') }}
                          <button type="submit" class="btn btn-danger">Delete</button></form></td>
                        </tr>
                      @endforeach
                      @else
                      <p>No product to display</p>
                    @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
            

@endsection