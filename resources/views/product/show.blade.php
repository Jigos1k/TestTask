@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center mt-3">
    <div class="card" style="width: 18rem;">
        <img src="https://placehold.in/400.png" class="card-img-top" alt="...">
        <div class="card-body">
            <div class="row m-0">
                <div class="col p-0 h-auto">
                    <div class="h-100 d-flex align-items-center">
                        <h5 class="card-title m-0">{{ $product->name }}</h5>
                    </div>
                </div>
            </div>
            <div class="row m-0">
                <div class="col p-0 h-auto">
                    <div class="h-100 d-flex align-items-center">
                        <div class="text-secondary">{{ $product->article }}</div>
                    </div>
                </div>
                <div class="col-auto p-0 h-auto">
                    <div class="h-100 d-flex align-items-center">
                        <span class="badge text-bg-secondary">{{ $product->status }}</span>
                    </div>
                </div>
            </div>
            <div class="">
                {{ $product->data ?? 'No data' }}
            </div>
            <div class="mt-2">
                <div class="d-flex justify-content-center">
                    <div class="d-flex align-items-center w-100">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary me-1 w-100">Back</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary ms-1 w-100">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection