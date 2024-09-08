@extends('layouts.app')

@section('content')

<nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{Route('home')}}" class="text-decoration-none">Home</a></li>
      <li class="breadcrumb-item active"><a href="{{route('view-product',['id'=>$product->id])}}" class="text-decoration-none text-secondary">View Product</a></li>
    </ol>  
</nav>

<div class="card">
    <img src="{{url('products/storedImage')}}/{{$product->image}}" class="card-img-top" alt="product-image"/>
    <div class="card-body">
        <div class="card-title fw-bold fs-3">{{$product->name}}</div>
        <p class="card-text text-secondary">{{$product->description}}</p>
        <p class="fs-5">M.R.P : <small class="text-danger text-decoration-line-through">{{$product->mrp}}</small></p>
        <p class="fs-5">Selling Price : <small class="text-success fw-bold">Rs.{{$product->sprice}}</small></p>
    </div>
</div>

@endsection