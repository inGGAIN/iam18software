@extends('template')
@section('content')
<div class="row">
    <div class="col-md-8">
        <img src="{{ $post->picture() }}" alt="Post Image" class="img-fluid w-10">
        <div class="my-2">
            <i>Posted On {{date('l, d F Y', strtotime($post->create_at)) }}</i> in <b><?= $post->name_category ?></b>
        </div>
        <div class="">
            {!! $post->content !!}
        </div>
        <div id="comment">
            <h3>Comment</h3>
            <div class="row">
                <div class="col-md-8">
                    @if(session('msg'))
                    <p class="alert alert-success">
                        {{session('msg)}}
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </p>
                    @endif
                    @if($errors->any())
                    @foreach($errors->all() as $err)
                    <p class="alert alert-danger">{{$err}}</p>
                    @endforeach
                    @endif
                    <form action="{{route(comment.store)}}" method="post">
                        <input type="hidden" name="id_post" value="{{$post->id_post}}">
                        @csrf
                        <div class="form-group">
                            <label for="">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Website</label>
                            <input type="text" name="website" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Comment</label>
                            <textarea name="comment" id="" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary"><i class="fa fa-send">Send Comment</i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <h4>Related Post</h4>
        @foreach($related as $rel)
        <h4><a href="{{ route('post.show', $rel) }}">{{ $rel->title }}</a></h4>
        <div class="">
            <a href="{{ route('post.show', $rel) }}">
                <img src="{{ $rel->picture() }}" alt="Picture Post" class="img-fluid">
            </a>
        </div>
        <div class="">
            {{ $rel->summary(10) }}
        </div>
        @endforeach
    </div>
</div>
@endsection