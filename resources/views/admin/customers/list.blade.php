@extends('home')
@section('page_title')
    Danh sach san pham
@endsection
@section('content')
    <h1 class="mt-4">Danh sach nguoi dung</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="{{route('customer.create')}}">Add Customer</a></li>
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
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($customers as $key => $customer)
                        <tr>
                            <td>{{ $key + $customers->firstItem()}}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('customer.edit',$customer->id)}}">Edit</a>
                                <a onclick="return confirm('Are you sure delete customer : {{ $customer->name }}')"
                                   class="btn btn-danger" href="{{route('customer.delete',$customer->id)}}">Delete</a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <ul class="pagination justify-content-end">
                    <li class="page-item">{{ $customers->links("pagination::bootstrap-4") }}</li>
                </ul>


            </div>
        </div>
    </div>
@endsection


