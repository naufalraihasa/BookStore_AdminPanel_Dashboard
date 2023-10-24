@extends('layouts.main')

@section('header')
    <h3 class="text-dark mb-4">Book</h3>
@endsection

@section('subheader')
    <p class="text-primary m-0 fw-bold">Book Info</p>
@endsection

@section('filter')
    <div class="col-md-6 text-nowrap d-flex gap-5">
        <div id="dataTable_length" class="dataTables_length ms-5" aria-controls="dataTable">
            <label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                    <option value="10" selected="">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>&nbsp;</label>
        </div>

        <div class="ml-2 ms-5">
            <label class="form-label">Option 2&nbsp;
                <select class="d-inline-block form-select form-select-sm">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
            </label>
        </div>
        
        <div class="ml-2 ms-5">
            <label class="form-label">Option 2&nbsp;
                <select class="d-inline-block form-select form-select-sm">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
            </label>
        </div>
    </div>

    <div class="col-md-6">
        <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search"
                    class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
    </div>
@endsection

@section('table')
    <table class="table my-0" id="dataTable">
        <thead>
            <tr>
                <th>ID</th>
                {{-- <th>Category ID</th> --}}
                <th>Category</th>
                <th>Book Name</th>
                <th>Book Description</th>
                <th>Book Stock</th>
                <th>Book Price</th>
                <th>Store Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @php
                $number = 1;
            @endphp

            @foreach ($data as $row)
                {{-- @if ($row->stores->store_name === 'A') --}}
                <tr>
                    <th scope="row">{{ $number++ }}</th>
                    {{-- <td>{{ $row->category_id }}</td> --}}
                    <td>{{ $row->category->category_name }}</td>
                    <td>{{ $row->book_name }}</td>
                    <td>{{ $row->book_description }}</td>
                    <td>{{ $row->book_stock }}</td>
                    <td>{{ $row->book_price }}</td>
                    <td>{{ $row->stores->store_name }}</td>
                    <td>
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
                    </td>
                </tr>
                {{-- @endif --}}
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>
                    <strong>
                        ID
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
                        Book Price
                    </strong>
                </th>
                <th>
                    <strong>
                        Store Name
                    </strong>
                </th>
                <th>
                    <strong>
                        Action
                    </strong>
                </th>
            </tr>
        </tfoot>
    </table>
@endsection

@section('add')
    <span>
        <a class="btn btn-primary d-block btn-user w-100" href="/addbooks"
            style="background: rgb(78,223,119);margin-left: 20px;margin-right: 20px;">
            <i class="fa fa-plus" style="font-size: 15px;margin-right: 2px;">
            </i>
            Add
        </a>
    </span>
@endsection


@section('pagination')
    <div class="col-md-6 align-self-center">
        <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
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
        </nav>
    </div>
@endsection
