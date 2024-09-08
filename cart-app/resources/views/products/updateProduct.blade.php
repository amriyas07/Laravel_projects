@extends('layouts.app')

@section('content')

<h4 class="mb-1"><i class="fa-regular fa-pen-to-square"></i> Edit Product</h4> <hr/>
<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-decoration-none">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{route('edit-product',['id'=>$product->id])}}" class="text-decoration-none text-secondary">Edit Product</a></li>
  </ol>  
</nav>

<div class="col-md-8">
    <form action="{{route('update-submit',['id'=>$product->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @if($errors->has('name')) {{'is-invalid'}} @endif" name="name" id="name" placeholder="Enter Product Name" value="{{old('name',$product->name)}}"/>
                @if($errors->has('name')) <div class="invalid-feedback">{{$errors->first('name')}}</div> @endif
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 mb-3">
                <label for="mrp" class="form-label">M.R.P</label>
                <input type="text" class="form-control @if($errors->has('mrp')) {{'is-invalid'}} @endif" name="mrp" id="mrp" placeholder="Enter MRP" value="{{old('mrp',$product->mrp)}}"/>
                @if($errors->has('mrp')) <div class="invalid-feedback">{{$errors->first('mrp')}}</div> @endif
            </div>
            <div class="col-md-6 mb-3">
                <label for="sp" class="form-label">Selling Price</label>
                <input type="text" class="form-control @if($errors->has('sp')) {{'is-invalid'}} @endif" name="sp" id="sp" placeholder="Enter Selling Price" value="{{old('sp',$product->sprice)}}"/>
                @if($errors->has('sp')) <div class="invalid-feedback">{{$errors->first('sp')}}</div> @endif
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <label class="form-label" for="description">Description</label>
                <textarea class="form-control @if($errors->has('description')) {{'is-invalid'}} @endif" style="resize: none;" name="description" id="description" rows="4" placeholder="Enter Description">{{old('description',$product->description)}}</textarea>
                @if($errors->has('description')) <div class="invalid-feedback">{{$errors->first('description')}}</div> @endif
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-12">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control @if($errors->has('image')) {{'is-invalid'}} @endif" name="image" id="image" accept="image/*"/>
                @if($errors->has('image')) <div class="invalid-feedback">{{$errors->first('image')}}</div> @endif
            </div>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success">Update Product</button>
            <a href="{{route('home')}}" class="btn btn-danger">Cancel</a>
        </div>

    </form>

</div>



@endsection