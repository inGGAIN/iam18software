@extends('template')
@section('content')
@if(session('msg'))
<p class="alert alert-success">{{ session('msg') }}
<div class="alert-dismissible fade show"></div>
<button class="btn-close" type="button" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</p>
@endif

<div class="card rounded-3 container card-primary">
    <div class="card-header row">
        <form action="#" class="form-group mr-1">
            <!-- SEARCH  -->
            <div class="form-group mr-1 my-1 row container">
                <div class="row">
                    <form action="" class="col align-items-start form-inline">
                        <input type="search" aria-label="search" class="col form-control mr-sm-1 rounded-pill" name="q" placeholder="Search..." value="{{ $q }}" />
                    </form>
                    <button class="col col-sm-1 btn btn-success rounded-pill">
                        <i class="fa fa-search"></i>
                    </button>
                    @auth
                    <a href="{{ route('user.create') }}" class="col col-sm-1 btn btn-primary rounded-pill">
                        <i class="fa fa-plus"></i>
                    </a>
                    @endauth
                </div>
            </div>


            <!-- SEARCH BTN  -->
            <div class="form-group mr-1 my-1">
                <!-- ADD  -->

            </div>

        </form>
    </div>
    <div class="">
        <table class="container table table-border table-stripped table-hover">
            <tr class="table bg-primary text-light">
                <th>No</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php $no = ($users->currentPage() - 1) * $users->perPage() + 1 ?>
            @foreach($users as $user)
            <tr class="table">
                <td class="text-center">{{ $no++ }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <div class="btn-group dropend">
                        <button class="btn fa fa-ellipsis-h" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                            <li class="nav-item">
                                <a type="submit" class="btn btn-outline-dark rounded-circle" href="{{ route('user.edit', $user->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form class="nav-item d-inline" action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('R U Sure?')">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-dark rounded-circle">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                                <button type="submit" class="btn btn-outline-dark rounded-circle" href="#">
                                    <i class="fa fa-question"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </td>
                <th></th>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="card-footer">
        {{ $users->links() }}
    </div>
</div>
@endsection