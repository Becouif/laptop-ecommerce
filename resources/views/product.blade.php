@extends('layouts.app')

@section('content')
<div class="container">
  <main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Album example</h1>
      <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
      <p>
        <a href="#" class="btn btn-primary my-2">Main call to action</a>
        <a href="#" class="btn btn-secondary my-2">Secondary action</a>
      </p>
    </div>
  </section>

  <!-- category  -->
  <h2>Category</h2>
  @foreach ($categories as $key=>$category)
    <button class="btn btn-secondary">{{$category->name}}</button>
  @endforeach

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
        <h1>Products</h1>
        @foreach ($products as $key=>$product)
        <div class="col-md-4">
          <div class="card mb-4 box-shadow">
            <img class="card-img-top" src="{{ Storage::url($product->image) }}" height="200" style="width:100%" alt="Card image cap">
            <div class="card-body">
              <p><b>{{$product->name}}</b></p>
              <p class="card-text">{{Str::limit($product->description,120)}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="product/{{$product->id}}"><button type="button" class="btn btn-sm btn-outline-primary">View</button></a>
                  
                  <button type="button" class="btn btn-sm btn-outline-success">Add to cart</button>
                </div>
                <small class="text-muted">${{$product->price}}</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="jumbotron">

      <!-- start of new carousel  -->
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <div class="col-3">
                  <img src="images/laptop_hp_thumbnail.jpg" alt="" class="img-thumbnail">
              </div>
              <div class="col-3">
                  <img src="images/laptop_hp_thumbnail.jpg" alt="" class="img-thumbnail">
              </div>
              <div class="col-3">
                  <img src="images/laptop_hp_thumbnail.jpg" alt="" class="img-thumbnail d-block w-100">
              </div>
              <div class="col-3">
                  <img src="images/laptop_hp_thumbnail.jpg" alt="" class="img-thumbnail">
              </div>
                
            </div>
          </div>
          <div class="carousel-item">
          <div class="row">
              <div class="col-3">
                  <img src="images/laptop_hp_thumbnail.jpg" alt="" class="img-thumbnail">
              </div>
              <div class="col-3">
                  <img src="images/laptop_hp_thumbnail.jpg" alt="" class="img-thumbnail">
              </div>
              <div class="col-3">
                  <img src="images/laptop_hp_thumbnail.jpg" alt="" class="img-thumbnail d-block w-100">
              </div>
              <div class="col-3">
                  <img src="images/laptop_hp_thumbnail.jpg" alt="" class="img-thumbnail">
              </div>
                
            </div>
          </div>
          
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <!-- end of new carousel  -->

    

  </div>
  </main>

  <footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <a href="#">Back to top</a>
    </p>
    <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
  </div>
  </footer>


</div>



   
@endsection
