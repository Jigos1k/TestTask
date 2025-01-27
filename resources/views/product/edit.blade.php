@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row m-0">
        <div class="col">
            <h1>Edit Product</h1>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                
                        <div class="form-group mt-2">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
                        </div>
                
                        <div class="form-group mt-2">
                            <label for="price">Article</label>
                            <input type="text" class="form-control" id="article" name="article" value="{{ old('article', $product->article) }}" required>
                        </div>
                
                        <div class="form-group mt-2">
                            <label for="status">Status</label>
                            <select name="status" class="form-control form-select" required>
                                <option value="available" {{ $product->status === 'available' ? 'selected' : '' }}>Available</option>
                                <option value="unavailable" {{ $product->status === 'unavailable' ? 'selected' : '' }}>Unavailable</option>
                            </select>
                        </div>
                
                        <div class="form-group mt-2">
                            <label for="description">Data  (JSON)</label>
                            <textarea class="form-control" id="data" name="data">{{ old('data', $product->data) }}</textarea>
                        </div>
                        <div class="d-flex justify-content-end mt-2">
                            <div class="d-flex align-items-center">
                                <a href="{{ route('products.index') }}" class="btn btn-secondary mx-1">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection