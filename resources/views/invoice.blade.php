@extends('components.master')
@section('content')
    <section class="container my-5">
        <h1 class="text-center text-uppercase d-md-none">Invoice</h1>
        <form action="{{ route('invoice.save') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-4">
                        <label for="title" class="col-sm-2 col-form-label">Invoice</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            @error('title')
                                <label class="error text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </label>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="due_date" class="col-sm-2 col-form-label">Due Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="due_date" value="{{ old('due_date') }}">
                            @error('due_date')
                                <label class="error text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </label>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h1 class="text-end text-uppercase d-none d-md-block">Invoice</h1>
                </div>
                <hr class="my-3 my-md-5">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mb-4">Address Information</h3>
                    <div class="row mb-4">
                        <label for="line" class="col-sm-2 col-form-label">Street</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="line" value="{{ old('line') }}">
                            @error('line')
                                <label class="error text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </label>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="city" class="col-sm-2 col-form-label">City</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="city" value="{{ old('city') }}">
                            @error('city')
                                <label class="error text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </label>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="state" class="col-sm-2 col-form-label">State</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="state">
                                @include('components.countries')
                            </select>
                            @error('state')
                                <label class="error text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </label>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                </div>
                <hr class="my-3 my-md-5">
            </div>
            <h3 class="mb-4">Products</h3>
            <div class="row" id="toggled-row" style="display: none;">
                <div class="col-md-4">
                    <label for="product_id" class="col-sm-2 col-form-label">Product</label>
                    <select class="form-select" id="mySelect" name="product_id" onchange="myFunction()">
                        @foreach ($products as $product)
                            @if ($product->quantity_in_stock > 0)
                                <option value="{{ $product->id }}" data-product-price="{{ $product->unit_price }}">
                                    {{ $product->name }}
                                    ({{ $product->unit_price }}$)
                                </option>
                            @endif
                        @endForeach
                    </select>
                    @error('product_id')
                        <label class="error text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </label>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                    <input type="number" class="form-control" name="quantity" value="{{ old('quantity') }}" data-product-quantity="{{ $product->quantity }}">
                    @error('quantity')
                        <label class="error text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </label>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="comment" class="col-sm-2 col-form-label">Description</label>
                    <input type="text" class="form-control" name="comment" value="{{ old('comment') }}">
                    @error('comment')
                        <label class="error text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </label>
                    @enderror
                </div>
            </div>
            <button type="button" class="btn btn-success mt-3" id="add-button">+ Add</button>
            <div class="text-end">
                <button type="button" class="btn btn-success mt-3" id="total-price">Total Price</button>
                <button type="submit" class="btn btn-success mt-3">Save</button>
            </div>
        </form>
    </section>
@endsection
