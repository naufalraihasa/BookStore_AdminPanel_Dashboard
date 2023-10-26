@extends('layouts.ordercustomer')

@section('title')
<title>Order List Store B</title>
@endsection

@section('sidebar')
<nav class="navbar align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbar-dark">
    <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
            <div class="sidebar-brand-text mx-3"><span>Brand</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item">
                <a class="nav-link" href="/analytics_store_B"><i class="far fa-chart-bar"></i><span>Analytics</span></a>
            </li>
            <li class="nav-item"></li>
            <li class="nav-item">
                <a class="nav-link" href="/book_store_B"><i class="far fa-list-alt"></i><span>Books</span></a>
                <a class="nav-link" href="/customersB"><i class="far fa-list-alt"></i><span>Customers</span></a>
                <a class="nav-link" href="/ordersB"><i class="far fa-list-alt"></i><span>Orders</span></a>
                <a class="nav-link" href="/orderlistB"><i class="far fa-list-alt"></i><span>Order List</span></a>
            </li>
            <li class="nav-item"></li>
            <li class="nav-item"></li>
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>
@endsection

@section('orderlist')
<div class="container-fluid">
    <h3 class="text-dark mb-4">Orders List</h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Orders List</p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer ID</th>
                            <th>Store ID</th>
                            <th>Total</th>
                            <th>Order Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->customer_id }}</td>
                            <td>{{ $order->store_id }}</td>
                            <td>{{ $order->orderDetails->sum('subtotal') }}</td>
                            <td>{{ $order->orderDetails[0]->created_at }}</td>
                            <td>
                                <a href="{{ route('orderdetailsB.showB', ['id' => $order->id]) }}" class="btn btn-primary">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/bs-init.js"></script>
<script src="assets/js/Billing-Table-with-Add-Row--Fixed-Header-Feature-Billing-Table-with-Add-Row--Fixed-Header.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="assets/js/theme.js"></script>
@endsection
