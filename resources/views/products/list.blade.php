@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Products</div>
                    <div class="panel-body">
                        <div class="row text-right">
                            <a class="btn btn-primary" href="{{ url('products/create') }}" role="button">New product</a>
                        </div>
                        @if(isset($message))
                        <div class="alert alert-success" role="alert">
                            {{ $message }}
                        </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col" width="50%">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Sale Price</th>
                                <th scope="col">Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $product['name'] }}</td>
                                    <td>{{ $product['description'] }}</td>
                                    <td>{{ $product['price'] }}</td>
                                    <td>{{ $product['sale_price'] }}</td>
                                    <td>
                                        <a href="{{ url('products') }}/{{ $product['id'] }}" role="button">Show</a>
                                        <a href="{{ url('products') }}/{{ $product['id'] }}/edit" role="button">Edit</a>
                                        <a href="{{ url('products') }}/{{ $product['id'] }}" role="button"
                                           onclick="event.preventDefault();
                                           document.getElementById('delete-form-{{ $product["id"] }}').submit();"
                                        >Delete</a>
                                        <form id="delete-form-{{ $product['id'] }}" action="{{ url('products') }}/{{ $product['id'] }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="_method" value="DELETE" >
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
