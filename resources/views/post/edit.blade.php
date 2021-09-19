@extends('template')
@section('content')
<form action="{{route('post.update', $post)}}" method="post" enctype="multipart/form-data">
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
                        <label for="">
                            Title
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" value="{{old('title', $post->title)}}" name="title" class="form-control">
                        <div class="form-group">
                            <label for="">
                                Category
                                <span class="text-danger">*</span>
                                <select name="id_category" class="form-control">
                                    @foreach($categories as $category)
                                    @if($category->id_category==old('id_category', $post->id_category))
                                    <option value="{{$category->id_category}}" selected>{{$category->name_category}}</option>
                                    @else
                                    <option value="{{$category->id_category}}">{{$category->name_category}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="">Pictures</label>
                            <input type="file" name="picture" class="form-control">
                            <p class="form-text">No Picture</p>
                            <img src="{{$post->picture()}}" height="75" alt="">
                        </div>
                        <div class="form-group">
                            <label for="">Content Post</label>
                            <textarea name="content" rows="10" class="form-control">
                            {{old('content', $post->content)}}
                            </textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success">
                            <i class="fa fa-save"></i>
                            Save</button>
                        <a href="{{route('post.index')}}" class="btn btn-danger">
                            <i class="fa fa-arrow-left"></i>
                            Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection