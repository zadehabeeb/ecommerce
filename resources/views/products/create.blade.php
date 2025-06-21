@extends('layout.master')

@section('content')
    <div class="container">
        <h1>Add New Product</h1>
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" name="stock" id="stock" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="subcategory_id">Subcategory</label>
                <select name="subcategory_id" id="subcategory_id" class="form-control" required>
                    @foreach($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success mt-3">Save Product</button>
        </form>
    </div>
@endsection
