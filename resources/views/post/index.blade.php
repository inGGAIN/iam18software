@extends('template')
@section('content')
@if(session('msg'))
<p class="alert alert-success">{{session('msg')}}
    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</p>
@endif
<div class="card card-outline card-primary">
    <div class="card-header">
        <form class="form-inline">
            <div class="form-control border-0 mr-1 rounded-pill">
                <input type="text" class="form-control rounded-pill" name="q" placeholder="Search..." value="{{ $q }}">
            </div>
            <div class="form-group ">
                <button class="btn btn-success rounded-pill">
                    <i class="fa fa-search"></i>
                </button>
                <div class="form-group  d-inline">
                    <a href="{{route('post.create')}}" class="btn btn-primary rounded-pill">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
        </form>
    </div>
    <div class="panel-body">
        <table class="table table-border table-striped table-hover">
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Category</th>
                <th>Pictures</th>
                <th>Content</th>
                <th>Action</th>
            </tr>
            <?php $no = ($post->currentPage() - 1) * $post->perPage() + 1 ?>
            @foreach($post as $post)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->name_category}}</td>
                <td>
                    <img src="{{ $post->picture() }}" height="75" alt="Post Image">
                </td>
                <td>{{$post->content}}</td>
                <td>
                    <a href="{{route('post.edit', $post)}}" class="btn">
                        <i class="fa fa-edit"></i>
                        <form action="{{route('post.destroy', $post)}}" method="post" onsubmit="return confirm('R U Sure for Delete {{$post->name}}')" >
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn">
                                <i class="fa fa-trash">
                                </i>
                            </button>
                        </form>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="card-footer">
    <!--  $post->link() -->
    </div>
</div>
@endsection