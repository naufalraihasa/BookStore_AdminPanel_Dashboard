@extends('layouts.orderdetails')

@section('sidebar')
<nav class="navbar align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbar-dark">
<div class="container-fluid d-flex flex-column p-0"><a
class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0"
href="#">
<div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
<div class="sidebar-brand-text mx-3"><span>Brand</span></div>
</a>
<hr class="sidebar-divider my-0">
<div>
<ul class="navbar-nav text-light" id="accordionSidebar">
    <li class="nav-item"><a class="nav-link" href="/analytics_store_B"><i
                class="far fa-chart-bar"></i><span>Analytics</span></a></li>
    <li class="nav-item">
        <a class="nav-link" href="/books_store_B"><i
                class="far fa-list-alt"></i><span>Books</span></a>
        <a class="nav-link" href="/customersB"><i
                class="fas fa-table"></i><span>Customers</span></a>
        <a class="nav-link" href="/ordersB"><i class="far fa-list-alt"></i><span>Orders</span></a>
        <a class="nav-link" href="/orderlistB"><i class="far fa-list-alt"></i><span>Order
                List</span></a>
    </li>
    <li class="nav-item"></li>
    <li class="nav-item"></li>
</ul>
<div class="text-center d-none d-md-inline">
    <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
</div>
</div>
</nav>
@endsection

@section('orderdetails')
<div class="container-fluid">
<h3 class="text-dark mb-4">Order Details</h3>
<div class="card shadow">
    <div class="card-header py-3">
        <p class="text-primary m-0 fw-bold">Product Info</p>
    </div>
    <div class="card-header py-3">
        <p class="text-primary m-0 fw-bold"></p>
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-sm-6"><span style="color: rgb(0,0,0);font-weight: bold;">Order ID</span><span style="color: rgb(0,0,0);margin-left: 22px;">{{ $order->id }}</span></div>
                    <div class="col-sm-6"><span style="color: rgb(0,0,0);font-weight: bold;">Name</span><span style="color: rgb(0,0,0);margin-left: 22px;">{{ $order->customer->customer_name }}</span></div>
                    <div class="col-sm-6"><span style="color: rgb(0,0,0);font-weight: bold;">Customer ID</span><span style="color: rgb(0,0,0);margin-left: 22px;">{{ $order->customer_id }}</span></div>
                    <div class="col-sm-6"><span style="color: rgb(0,0,0);font-weight: bold;">Email</span><span style="color: rgb(0,0,0);margin-left: 22px;">{{ $order->customer->email }}</span></div>
                    <div class="col-sm-6"><span style="color: rgb(0,0,0);font-weight: bold;">Order Date</span><span style="color: rgb(0,0,0);margin-left: 22px;">{{ $order->order_date }}</span></div>
                    <div class="col-sm-6"><span style="color: rgb(0,0,0);font-weight: bold;">Phone</span><span style="color: rgb(0,0,0);margin-left: 22px;">{{ $order->customer->phone }}</span></div>
                    <div class="col-sm-6"><span style="color: rgb(0,0,0);font-weight: bold;">Store ID</span><span style="color: rgb(0,0,0);margin-left: 22px;">{{ $order->store_id }}</span></div>
                    <div class="col-sm-6"><span style="color: rgb(0,0,0);font-weight: bold;">Address</span><span style="color: rgb(0,0,0);margin-left: 22px;">{{ $order->customer->address }}</span></div>
                    <div class="col-sm-6"><span style="color: rgb(0,0,0);margin-left: 22px;"></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 text-nowrap">
                <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                            <option value="10" selected="">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>&nbsp;</label></div>
            </div>
            <div class="col-md-6">
                <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
            </div>
        </div>
        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
            <table class="table my-0" id="dataTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Book Name</th>
                        <th>Book Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->orderDetails as $detail)
                        <tr>
                            <td>{{ $detail->id }}</td>
                            <td>{{ $detail->book->book_name }}</td>
                            <td>{{ $detail->book->category->category_name }}</td>
                            <td>{{ $detail->book->book_price }}</td>
                            <td>{{ $detail->book_qty }}</td>
                            <td>{{ $detail->book_qty * $detail->book->book_price }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td><strong>Total Amount</strong></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>${{ $totalAmount }}</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="col">
            <div class="row">
                <div class="col-sm-6 col-xl-1" style="margin-right: 26px;padding-right: 0px;padding-left: 0px;"><span></span></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6"><span></span></div>
            <div class="col-sm-6"><span></span></div>
        </div>
    </div>
</div>
</div>
@endsection