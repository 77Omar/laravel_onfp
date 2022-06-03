@extends('layouts.main')

@section('content')
    <div class="row">

        <!-- <div class="col-lg-3">
             @//include('layouts.sidebar')
         </div>-->
        <!-- /.col-lg-3 -->

        <div class="col-lg-9"> &nbsp;
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            {{-- début du post --}}

            <table class="table table-striped">
                <tr>
                    <th>#</th>          <th>Nom Produit</th>           <th>Prix Produit</th>           <th>Description</th>
                </tr>
                    <tr>
                        <th>#</th>
                        <th>{{$product->name}}</th>
                        <th>{{$product->price}} </th>
                        <th>{{$product->description}} </th>
                        <th></th>
                        <th>
                            <div class="auhtor" style="display: flex">
                                <p><a href="{{route('products.edit',['product'=>$product->id])}}" class="btn btn-primary">Modifier</a></p>
                                <form action="{{route('products.destroy', ['product' =>$product->id])}}" method="post">
                                    @method("DELETE")
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </div>
                        </th>
                    </tr>
            </table>


            {{-- fin du post --}}

            <!--Pagination-->

        </div>
        <!-- /.col-lg-9 -->
    </div>
@stop
