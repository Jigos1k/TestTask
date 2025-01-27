@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row m-0">
        <div class="col">
            <h1>Add Product</h1>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="d-flex justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" required minlength="10">
                        </div>
                
                        <div class="form-group mt-2">
                            <label for="article">Article</label>
                            <input type="text" name="article" class="form-control" required>
                        </div>
                
                        <div class="form-group mt-2">
                            <label for="status">Status</label>
                            <select name="status" class="form-control form-select" required>
                                <option value="available" selected>Available</option>
                                <option value="unavailable">Unavailable</option>
                            </select>
                        </div>
                
                        <div class="form-group mt-2">
                            <label for="data">Data (JSON)</label>
                            <textarea name="data" class="form-control"></textarea>
                        </div>
                        <div class="d-flex justify-content-end mt-2">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
