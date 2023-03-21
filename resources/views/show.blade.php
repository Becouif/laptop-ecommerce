@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="card justify-content-center">
      <div class="row">
        <aside class="col-sm-5 border-right">
          <section class="gallery-wrap">
            <div class="img-big-wrap">
              <a href="">
                <img src="{{Storage::url($product->image)}}" width="450" alt="">
              </a>
            </div>

          </section>
        </aside>

        <aside class="class-sm-7 align-right">
          <section class="card-body p-5">
            <h3 class="title mb-3">
              {{ $product->name }}
            </h3>
            <p class="price-detail-wrap">
              <span class="price h3 text-danger">
                <span class="currency">US $ {{ $product->price }}</span>

              </span>

            </p>
            <h3>Description</h3>
            <p>{!!$product->description !!}</p>
            <h3>Additional Infomation</h3>
            <p>{!!$product->additional_info!!}</p>
            <hr>
            <div class="row">
            <a href="#" class="btn btn-lg btn-outline-success text-uppercase">Add to cart</a>
             
            </div>
            
             
          </section>
        </aside>
      </div>
    </div>
</div>
@endsection
