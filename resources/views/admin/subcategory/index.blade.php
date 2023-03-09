@extends('admin.layouts.main');
@section('content')
@extends('admin.layouts.main')

@section('content')

<div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">SubCategory Table</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    @if (Session::has('message'))
                      <p class="alert alert-success">{{Session::get('message')}}</p>
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
                      <td><p>No Categories available</p></td>
                      
                      @endif

                    </tbody>
                  </table>
                </div>
              </div>
            </div>


@endsection



@endsection