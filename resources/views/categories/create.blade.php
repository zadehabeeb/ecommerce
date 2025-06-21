@extends('layout.master')

@section('content')
    <div class="container">
        <h1>Add New Category</h1>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" id="name" class="form-control" required style="background-color: #f0f8ff; border: 1px solid #ccc; color: #333;">
            </div>
          
            <button type="submit" class="btn btn-success mt-3">Save Category</button>
        </form>
    </div>
@endsection
