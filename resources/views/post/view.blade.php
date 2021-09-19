@extends('template')
@section('content')
<form action="" class="mb-4 form-inline">
    <div class="mr-1 form-group">
        <select name="id_category" id="" class="form-control">
            <option value="">All Categories</option>
            @foreach($categories as $category)
            @if($category->id_category==old('id_category',$id_category))
            <option value="{{$category->id_category}}" selected>{{$category->name_category}}</option>
            <option value="{{$category->id_category}}">{{$category->name_category}}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group mr-1">
        <input name="q" value="{{$q}}" placeholder="Search..." class="form-control">
    </div>
    <div class="form-group mr-1">
        <button class="btn btn-success"><i class="fa fa-search"></i> Search</button>
    </div>
</form>
@if(count($posts))
<div class="row">
    @foreach($posts as $post)
    <div class="col-md-3">
        <h4><a href="{{route('post.show', $post)}}">{{$post->title}}</a></h4>
        <div class="">
            <a href="{{route('post.show',$post)}}">
                <img src="{{$post->picture()}}" alt="Post Picture" class="img-fluid">
            </a>
        </div>
        <div class="text-right my-1">
            <span>{{date('d F Y', strtotime($post->created_at))}}</span>
            <a href="" class="btn btn-sm btn-link">{{$post->name_category}}</a>
        </div>
        <div class="">
            {{$post->summary(15)}}...
        </div>
    </div>
    @endforeach
</div>
{{$posts->links()}}
@else
<p>No Post</p>
@endif
@endsection