
@extends('layouts.default')

@section('title', 'Search Results')

@section('extra-css')

  <link rel="stylesheet" href="{{ assert('css/algolia.css')}}">
@endsection

@section('content')
<link rel="stylesheet" href="css/search-result.css">
<link rel="stylesheet" href="css/button.css">
<link rel="stylesheet" href="css/form.css">
<link rel="stylesheet" href="css/table.css">
<link rel="stylesheet" href="css/breadcrumb.css">
<link rel="stylesheet" type="text/css" href="css/_pagination.css">
    @component('components.breadcrumbs')
        <a href="/">Home</a>
        <i class="fa fa-chevron-right breadcrumb-separator"></i>
        <span>Search</span>
    @endcomponent

        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
   
    <div class="search-results-container container">

        <h1>Search Results</h1>
        <p classe="search-results-count">{{ $products->total() }} result(s) for '{{ request()->input('query') }}'</p>
       
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Details</th>
                    <th>Description</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th><a href="{{ route('shop.show', $product->slug) }}">{{ $product->title }}</a></th>
                        <td>{{ $product->subtitle}}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->presentPrice() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

       
        {{ $products->appends(request()->input())->links() }}

    </div> 

@endsection
















