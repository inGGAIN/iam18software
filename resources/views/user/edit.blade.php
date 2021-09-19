@extends('template')
@section('content')
<form action="{{route('user.update', $user)}}" method="post">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    @if($errors->any())
                    @foreach($errors->all() as $err)
                    <p class="alert alert-danger">{{$err}}</p>
                    @endforeach
                    @endif
                    <div class="form-group">
                        <label for="" class="text-danger">New Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" placeholder="New Name" value="{{old('name', $user->name)}}">
                    </div>
                    <!-- Insert Username  -->
                    <div class="form-group">
                        <label for="">Username <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="username" placeholder="New Username" value="{{ old('username', $user->username) }}">
                    </div>
                    <!-- Insert Password  -->
                    <div class="form-group">
                        <label for="">Password<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="password" placeholder="New Password" value="{{ old('password') }}">
                    </div>
                    <!-- Insert Email  -->
                    <div class="form-group">
                        <label for="">Email<span class="text-danger">*</span></label>
                        <input class="form-control" type="email" name="email" placeholder="New Email" value="{{ old('email', $user->email) }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    <a href="{{route('user.index')}}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</i></a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection