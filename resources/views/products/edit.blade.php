@extends('layouts.app')

@section('content')
    <h1>Edit Product</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" required>{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" name="price" id="price" step="0.01" value="{{ $product->price }}" required>
        </div>

        <div class="form-group">
            <label for="brand_id">Brand</label>
            <select name="brand_id" id="brand_id" class="form-control" required>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" class="form-control" name="color" id="color" value="{{ $product->images->first()->color }}" required>
        </div>

        <div class="form-group">
            <label for="size">Size</label>
            <input type="text" class="form-control" name="size" id="size" value="{{ $product->images->first()->size }}">
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" name="stock" id="stock" value="{{ $product->images->first()->stock }}" required>
        </div>

        <div class="form-group">
            <label for="image_url">Image URL</label>
            <input type="url" class="form-control" name="image_url" id="image_url" value="{{ optional($product->images->first())->image_url }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
@endsection
