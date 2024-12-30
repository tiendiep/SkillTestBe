@extends('layouts.app')

@section('content')
    <h1>Create Product</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" required></textarea>
        </div>

        <div class="form-group">
    <label for="price">Price</label>
    <input type="number" class="form-control" name="price" id="price" step="0.01" required>
</div>


        <div class="form-group">
            <label for="brand_id">Brand</label>
            <select name="brand_id" id="brand_id" class="form-control" required>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image_url">Image URL</label>
            <input type="url" class="form-control" name="image_url" id="image_url">
        </div>

        <button type="submit" class="btn btn-primary">Create Product</button>
    </form>
@endsection
