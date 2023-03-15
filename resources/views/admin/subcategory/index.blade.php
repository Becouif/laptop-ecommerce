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


<div id="post-top">
  <div id="wrapper">
    
<div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">SubCategory Table</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    @if (Session::has('message'))
                      <p class="alert alert-primary">{{Session::get('message')}}</p>
                    @endif
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Action</th>
                        <th>-</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if (count($subcategories)>0)
                      @foreach ($subcategories as $key=>$subcategory)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$subcategory->name}}</td>
                        <td>{{ $subcategory->category->name }}</td>
                        <td><a href="{{route('subcategory.edit',[$subcategory->id])}}"><button class="btn btn-success">Edit</button></a></td>
                        <td>
                          <!-- confirmDelete can be found in footer  -->
                          <form action="{{route('subcategory.destroy',[$subcategory->id])}}" method="post" onsubmit="return confirmDelete()">@csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                      @else
                      <td><p class="text-danger">No subcategories available</p></td>
                      
                      @endif

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
  </div>
</div>



@endsection