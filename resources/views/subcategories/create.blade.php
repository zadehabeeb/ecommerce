@extends('layout.master')

@section('content')
    <div class="container">
        <h1>Add New Subcategory</h1>
        <form action="{{ route('subcategories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Subcategory Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success mt-3">Save Subcategory</button>
        </form>
    </div>
@endsection
