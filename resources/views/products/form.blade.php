@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Products</div>
                    <div class="panel-body">
                        <form action="{{ url('products') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="inputName">Name</label>
                                    <input class="form-control" id="inputName" type="text" name="name" value="{{ old('name') }}" placeholder="Enter the name for Product">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="inputName">Description</label>
                                    <input class="form-control" id="inputName" type="text" name="description" value="{{ old('description') }}" placeholder="Enter the description for Product">
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="{{ $errors->has('price') ? ' has-error' : '' }}">
                                    <label for="inputName">Price</label>
                                    <input class="form-control" id="inputName" type="text" name="price" value="{{ old('price') }}" placeholder="Enter the price for Product">
                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="{{ $errors->has('sale_price') ? ' has-error' : '' }}">
                                    <label for="inputName">Sale Price</label>
                                    <input class="form-control" id="inputName" type="text" name="sale_price" value="{{ old('sale_price') }}" placeholder="Enter the sale_price for Product">
                                    @if ($errors->has('sale_price'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('sale_price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
