@extends('template')
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                
                @if($errors->any())
                @foreach($errors->all() as $err)
                <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
                @endif
                <form action="{{ route('password.action') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>
                            Old Password
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="OldSand" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label>
                            New Password
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="NewSand" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label>
                            Confirm New Password
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="ConfNewSand" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection