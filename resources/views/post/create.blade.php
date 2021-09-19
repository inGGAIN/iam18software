@extends('template')
@section('content')
<form action="{{route('post.store')}}" enctype="multipart/form-data" method="post">
    @csrf
    <div class="row container">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    @if($errors->any())
                    @foreach($errors->all() as $err)
                    <p class="alert alert-danger">{{ $err }}</p>
                    @endforeach
                    @endif
                </div>
                <!-- FORM EDIT  -->
                <div class="form-group">
                    <label for="">
                        Title <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="title" value="{{old('title')}}" placeholder="Title" class="form-control" require>
                </div>
                <div class="form-group">
                    <label for="">
                        Category <span class="text-danger">*</span>
                    </label>
                    <select name="id_category" class="form-control">
                        @foreach($categories as $category)
                        @if($category->id_category==old('id_category'))
                        <option value="{{$category->id_category}}" selected>{{$category->id_category}}</option>
                        @else
                        <option value="{{$category->id_category}}">{{$category->name_category}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-froup">
                    <label for="">Pictures</label>
                    <input type="file" name="picture" class="form-control">
                </div>
                <div class="form-group">
                    <label>Content Post</label>
                    <textarea name="content" rows="10" class="form-control">{{ old('content') }}</textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i>
                    Save
                </button>
                <a href="{{route('post.index')}}" class="btn btn-danger">
                    <i class="fa fa-arrow-left"></i>
                    Back
                </a>
            </div>
        </div>
    </div>
</form>
@endsection