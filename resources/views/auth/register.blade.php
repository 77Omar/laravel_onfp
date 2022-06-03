@extends('layouts.main')

@section('content')
    <div class="row">

       <!-- <div class="col-lg-3">
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
                    Inscription
                </div>
                <div class="card-body">
                    <!--route('post.register') il va sortir la route localhost:8000/register d'apres inspecter code-->
                    <form action="{{route('post.register')}}" method="post">
                        @csrf <!--permet d'eviter les Files de securite-->

                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            @error('name')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                            @error('email')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" class="form-control">
                            @error('password')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Inscription</button>
                    </form></div>
                <p><a href="{{route('login')}}">J'ai deja un compte</a></p>
            </div>
        </div>
        <!-- /.card -->

    </div>
    <!-- /.col-lg-9 -->

    </div>
@stop
