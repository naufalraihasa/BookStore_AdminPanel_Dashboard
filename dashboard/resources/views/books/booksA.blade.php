@extends('layouts.store')

@section('sidebar')
    <div class="container-fluid d-flex flex-column p-0"><a
            class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            {{-- <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div> --}}
            <div class="sidebar-brand-text mx-3"><span>Analytics</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link" href="analytics_store_A"><i
                        class="far fa-chart-bar"></i><span>Analytics</span></a></li>
            <li class="nav-item">
                <a class="nav-link" href="/books_store_A"><i class="far fa-list-alt"></i><span>Books</span></a>
            </li>
            <li class="nav-item"></li>
            <li class="nav-item"></li>
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle"
                type="button"></button></div>
    </div>
@endsection

@section('header')
    <h3 class="text-dark mb-4">Book Store A</h3>
@endsection

@section('subheader')
    <p class="text-primary m-0 fw-bold">Book Info</p>
@endsection

@section('filter')
    <div class="col-md-6 text-nowrap">
        <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
            <label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                    <option value="10" selected="">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>&nbsp;</label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="text-md-end dataTables_filter" id="dataTable_filter">
            <form action="/books_store_A" method="GET">
                <label class="form-label">
                    <input type="search" name="search" class="form-control form-control-sm" aria-controls="dataTable"
                        placeholder="Search" value="{{ request('search') }}">
                </label>
            </form>
        </div>
    </div>
@endsection

@section('table')
    <table class="table my-0" id="dataTable">
        <thead>
            <tr>
                <th>No</th>
                {{-- <th>Category ID</th> --}}
                <th>Category</th>
                <th>Book Name</th>
                <th>Book Description</th>
                <th>Book Stock</th>
                {{-- <th>Store ID</th> --}}
                <th>Store Name</th>
                {{-- <th>Action</th> --}}
            </tr>
        </thead>
        <tbody>

            @php
                $number = 1;
            @endphp

            @foreach ($data as $index => $row)
                {{-- @if ($row->stores->store_name === 'A') --}}
                    <tr>
                        <th scope="row">{{ $index + $data->firstItem() }}</th>
                        {{-- <td>{{ $row->category_id }}</td> --}}
                        <td>{{ $row->category->category_name }}</td>
                        <td>{{ $row->book_name }}</td>
                        <td>{{ $row->book_description }}</td>
                        <td>{{ $row->book_stock }}</td>
                        {{-- <td>{{ $row->store_id }}</td> --}}
                        <td>{{ $row->stores->store_name }}</td>
                        {{-- <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-primary" href="/editbooks/{{ $row->id }}">
                                    <i class="fa fa-pencil"></i>
                                    Edit
                                </a>
                                <a href="/deletebooks/{{ $row->id }}" class="btn btn-danger">
                                    <i class="fa fa-trash-o"></i>
                                    Delete
                                </a>
                            </div>
                        </td> --}}
                    </tr>
                {{-- @endif --}}
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>
                    <strong>
                        No
                    </strong>
                </th>
                <th>
                    <strong>
                        Category
                    </strong>
                </th>
                <th>
                    <strong>
                        Book Name
                    </strong>
                </th>
                <th>
                    <strong>
                        Book Description
                    </strong>
                </th>
                <th>
                    <strong>
                        Book Stock
                    </strong>
                </th>
                <th>
                    <strong>
                        Store Name
                    </strong>
                </th>
                {{-- <th>
                    <strong>
                        Action
                    </strong>
                </th> --}}
            </tr>
        </tfoot>
    </table>
@endsection

{{-- @section('add')
    <span>
        <a class="btn btn-primary d-block btn-user w-100" href="/addbooks"
            style="background: rgb(78,223,119);margin-left: 20px;margin-right: 20px;">
            <i class="fa fa-plus" style="font-size: 15px;margin-right: 2px;">
            </i>
            Add
        </a>
    </span>
@endsection --}}


@section('pagination')
    <div class="col">
        {{-- <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
            Showing 1 to 10 of 27</p>
    </div>
    <div class="col-md-6">
        <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
            <ul class="pagination">
                <li class="page-item disabled"><a class="page-link" aria-label="Previous" href="#"><span
                            aria-hidden="true">«</span></a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span
                            aria-hidden="true">»</span></a></li>
            </ul>
        </nav> --}}
        {{$data->links('pagination::bootstrap-5')}}
    </div>
@endsection
