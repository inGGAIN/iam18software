@extends('template')
@section('content')
<div class="row">
        <div class="mx-auto mt-3 col-md-3">
            <div class="card card-primary">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    @if($errors->any())
                    @foreach($errors->all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>
                    @endforeach
                    @endif
                    <form action="{{ route('login.action') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" value="{{ old('password') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">LOGIN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection