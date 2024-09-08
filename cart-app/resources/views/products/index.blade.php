@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between">
        <h4><i class="fa-brands fa-product-hunt"></i>roducts</h4>
        <a href="{{route('add-product')}}" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i> Add Products</a>
    </div>

    <div class="col-md-12 table-responsive mt-5">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>M.R.P</th>
                    <th>Selling Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($products as $product)
                @php
                    $i = ($products->currentPage() - 1 ) * $products->perPage() + $loop->iteration;
                @endphp
                <tr>
                    <td>{{$i}}</td>
                    <td><img src="products/storedImage/{{$product->image}}" class="prod-img" alt="product-image" /></td>
                    <td><a href="{{route('view-product',['id'=>$product->id])}}" class="text-decoration-none">{{$product->name}}</a></td>
                    <td>{{$product->mrp}}</td>
                    <td>{{$product->sprice}}</td>
                    <td>
                        <a href="{{route('edit-product',['id'=>$product->id])}}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                        <button onclick="removeItem({{$product->id}})" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
        
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{$products->links()}}
    </div>

<script>
    function removeItem(id){
        Swal.fire({
        title: "Are you sure?",
        text: "You wan't to delete this product!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                url: "/delete-product/" + id,
                success: function (response) {
                    Swal.fire({
                    title: "Deleted!",
                    text: "Your Data has been deleted.",
                    icon: "success"
                    }).then(() => {
                            location.reload();
                        });
                }
            });
        }
        });
    }
</script>

@if (Session::get('msg'))
    <script>
        Swal.fire({
        position: "top-end",
        icon: "success",
        title: "{{ Session::get('msg') }}",
        showConfirmButton: false,
        timer: 1500
        });
    </script>
@endif
    
@endsection