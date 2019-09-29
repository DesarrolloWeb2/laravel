@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Products</div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col" width="50%">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Sale Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td scope="col">#</td>
                                <td scope="col">{{ $product['name'] }}</td>
                                <td scope="col">{{ $product['description'] }}</td>
                                <td scope="col">{{ $product['price'] }}</td>
                                <td scope="col">{{ $product['sale_price'] }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
