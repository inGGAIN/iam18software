@extends('template')
@section('content')
<form action="{{ route('user.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    @if($errors->any())
                    @foreach($errors->all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>
                    @endforeach
                    @endif
                    <!-- Insert Name  -->
                    <div class="form-group">
                        <label for="">Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="name" placeholder="Name" value="{{ old('name') }}">
                    </div>
                    <!-- Insert Username  -->
                    <div class="form-group">
                        <label for="">Username <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="username" placeholder="username" value="{{ old('username') }}">
                    </div>
                    <!-- Insert Password  -->
                    <div class="form-group">
                        <label for="">Password<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="password" placeholder="Password" value="{{ old('password') }}">
                    </div>
                    <!-- Insert Email  -->
                    <div class="form-group">
                        <label for="">Email<span class="text-danger">*</span></label>
                        <input class="form-control" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                    </div>
                </div>
            </div>
            <div class="card-footer">
            <button class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
            <a href="{{ route('user.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a></div>
        </div>
    </div>
</form>
@endsection