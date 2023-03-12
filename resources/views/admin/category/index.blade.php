@extends('admin.layouts.main')

@section('content')

<div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Category Table</h6>
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
                        <th>Description</th>
                        <th>Image</th>
                        <th>-</th>
                        <th>-</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if (count($categories)>0)
                      @foreach ($categories as $key=>$category)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{ $category->description }}</td>
                        <!-- display the image  -->
                        <td><img src="{{ Storage::url($category->image) }}" width="100" alt="{{$category->name}}"></td>
                        <td><a href="{{route('category.edit',[$category->id])}}"><button class="btn btn-success">Edit</button></a></td>
                        <td>
                          <!-- confirmDelete can be found in footer  -->
                          <form action="{{route('category.destroy',[$category->id])}}" method="post" onsubmit="return confirmDelete()">@csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                      @else
                      <td><p class="alert text-danger">No categories available</p></td>
                      
                      @endif

                    </tbody>
                  </table>
                </div>
              </div>
            </div>


@endsection