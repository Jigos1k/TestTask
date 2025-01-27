@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row m-0">
            <div class="col">
                <h1>Products</h1>
            </div>
            <div class="col-auto p-0">
                <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
            </div>
        </div>
        <div class="row m-0">
            @foreach ($products as $product)
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <img src="https://placehold.in/400.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="row m-0">
                                <div class="col p-0 h-auto">
                                    <div class="h-100 d-flex align-items-center">
                                        <h5 class="card-title m-0">{{ $product->name }}</h5>
                                    </div>
                                </div>
                                <div class="col-auto p-0">
                                    <div class="dropdown">
                                        <button class="btn btn-light bg-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item text-secondary" href="{{ route('products.show', $product) }}">
                                                    <div class="row m-0">
                                                        <div class="col-3 ps-0">
                                                            <i class="fa-solid fa-eye"></i>
                                                        </div>
                                                        <div class="col p-0">
                                                            View
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item text-secondary" href="{{ route('products.edit', $product) }}">
                                                    <div class="row m-0">
                                                        <div class="col-3 ps-0">
                                                            <i class="fa-solid fa-pen"></i>
                                                        </div>
                                                        <div class="col p-0">
                                                            Edit
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger">
                                                        <div class="row m-0">
                                                            <div class="col-3 ps-0">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </div>
                                                            <div class="col p-0">
                                                                Delete
                                                            </div>
                                                        </div>
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
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
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection