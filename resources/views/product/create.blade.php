@extends('layouts.main')

@section('content')
    <div class="row">

        <!--<div class="col-lg-3">
            @//include('includes.sidebar')
        </div>-->
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
            <!-- /.card -->
            <!--//On va afficher ca o nivo register.blade en utilisant les session-->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card card-outline-secondary my-4">
                <div class="card-header">
                    Ajouter un Produit
                </div>
                <div class="card-body">
                    <form action="{{route('products.store')}}" method="post">

                        @csrf <!--permet d'eviter les Files de securite-->

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            @error('name')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Prix</label>
                            <input type="text" name="price" class="form-control" value="{{ old('price') }}">
                            @error('price')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" cols="30", rows="5" placeholder="Description du produit">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <select name="category_id" id="category_id" class="form-control">
                                <option value=""></option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if(old('category') == $category->id) selected @endif>
                                        {{$category->title}}
                                    </option>
                                @endforeach
                            </select>
                            @error('category')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form></div>
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col-lg-9 -->
    </div>
@stop
