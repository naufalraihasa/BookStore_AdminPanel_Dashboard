@extends('layouts.customersformA')

@section('form-input')
    <h3 class="text-dark mb-4">Edit Customer</h3>
    <div class="row mb-3">
        <div class="col-lg-8">
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Edit Customer</p>
                        </div>
                        <div class="card-body">
                            <form action="/updatecustomersA/{{ $customer->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="customer-name">
                                                <strong>Name</strong>
                                            </label>
                                            <input class="form-control" type="text" id="customer-name" name="customer_name" value="{{ $customer->customer_name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for "email">
                                                <strong>Email</strong>
                                            </label>
                                            <input class="form-control" type="email" id="email" name="email" value="{{ $customer->email }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="phone">
                                                <strong>Phone</strong>
                                            </label>
                                            <input class="form-control" type="tel" id="phone" name="phone" value="{{ $customer->phone }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="address">
                                                <strong>Address</strong>
                                            </label>
                                            <input class="form-control" type="text" id="address" name="address" value="{{ $customer->address }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary btn-sm ms-3" type="submit" style="background: rgb(28,200,138);width: 68.0625px;height: 38.6px;font-size: 16px;">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
