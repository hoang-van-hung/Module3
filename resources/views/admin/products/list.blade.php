@extends('home')
@section('page_title')
    Danh sach san pham
@endsection
@section('content')
    <h2 class="mt-4">Danh sach san pham</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="{{route('products.create')}}">Add Product</a></li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Category ID</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Category ID</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($products as $key => $product)
                        <tr>
                            <td>{{ $key + $products->firstItem()}}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->type }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->content }}</td>
                            <td><img src="{{ asset('storage/' . $product->img) }}" width="100" alt=""></td>
                            <td>{{ $product->category_id }}</td>
                            <td>{{ $product->price }}</td>

                            <td>
                                <a onclick="return confirm('Are you sure delete products : {{ $product->name }}')"
                                   class="btn btn-danger" href="{{ route('products.delete', $product->id) }}">Delete</a>
                                <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <ul class="pagination justify-content-end">
                    <li class="page-item">{{ $products->links("pagination::bootstrap-4") }}</li>
                </ul>


            </div>
        </div>
    </div>
@endsection

