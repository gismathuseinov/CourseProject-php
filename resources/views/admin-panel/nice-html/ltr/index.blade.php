@extends('admin-panel.nice-html.ltr.main')
@section('main')
    <style>
        .statistic-block {
            padding: 20px;
            background: #2d3035;
            color: #8a8d93;
        }

        .statistic-block .title {
            margin-bottom: 0;
        }

        .statistic-block strong,
        .statistic-block span {
            display: block;
        }

        .statistic-block strong {
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-size: 0.9rem;
            color: #8a8d93;
            margin-bottom: 5px;
        }

        .statistic-block .icon {
            margin-bottom: 5;
            font-size: 1.2rem;
            color: #8a8d93;
        }

        .statistic-block .number {
            color: inherit;
            font-size: 2.2rem;
        }

        .statistic-block .number {
            color: inherit;
            font-size: 2.2rem;
        }
    </style>
    <div class="page-wrapper">

        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Dashboard</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin.dashboard')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">DashBoard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div style="float: left" class="col-md-3 col-sm-6">
                                    <div class="statistic-block block">
                                        <div class="progress-details d-flex align-items-end justify-content-between">
                                            <div class="title">
                                                <div class="icon"><i class="icon-user-1"></i></div>
                                                <strong>All Users</strong>
                                            </div>
                                            <div class="number dashtext-1">
                                                {{$userCount}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="float: left" class="col-md-3 col-sm-6">
                                    <div class="statistic-block block">
                                        <div class="progress-details d-flex align-items-end justify-content-between">
                                            <div class="title">
                                                <div class="icon"><i class="icon-user-1"></i></div>
                                                <strong>Unread Messages</strong>
                                            </div>
                                            <div class="number dashtext-1">
                                                {{$unReadMessage}}
                                            </div>
                                        </div>
                                        <div class="progres">
                                            <div>
                                                <button class="btn btn-outline-warning"><a
                                                        href="{{route('admin.message')}}">Show</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="float: left" class="col-md-3 col-sm-6">
                                    <div class="statistic-block block">
                                        <div class="progress-details d-flex align-items-end justify-content-between">
                                            <div class="title">
                                                <div class="icon"><i class="icon-user-1"></i></div>
                                                <strong>Receive Wait Complaint</strong>
                                            </div>
                                            <div class="number dashtext-1">
                                                {{$newComplaint}}
                                            </div>
                                        </div>
                                        <div class="progres">
                                            <div>
                                                <button class="btn btn-outline-warning"><a
                                                        href="{{route('admin.issue')}}">Show</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <h1>Posts</h1>
                                <ul class="list-group" id="posts">
                                    @foreach($postTitles as $key => $postTitle)
                                        <li class="list-group-item d-flex justify-content-between align-items-center"
                                            id="{{$postTitle->id}}">
                                            {{$postTitle->complaint_title}}
                                            <span
                                                class="badge badge-primary badge-pill">{{ $postTitle->comments->count() }}</span>
                                            <div class="form-group">
                                                <select class="form-control" name="active">
                                                    <option disabled selected
                                                            hidden>{{ $postTitle->is_active == '1' ? 'Active' : 'Deactive' }}</option>
                                                    <option value="0">Deactive</option>
                                                    <option value="1">Active</option>
                                                </select>
                                            </div>
                                            <button class="btn btn-success">OK</button>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="pagination">
                                    {{ $postTitles->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <h1>Users</h1>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $key => $user)
                                        <tr>
                                            <th scope="row">{{$user->id}}</th>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                            </div>
                            <div class="pagination">
                                {{$users->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        $('#posts li').click(function () {

            let post_id = this.id;

            $('select').click(function () {
                let is_active = this.value;
                $('.btn-success').click(function () {
                    axios.post('{{ route('post.active') }}',
                        {
                            is_active,
                            post_id,
                        })
                        .then(function (response) {
                            // console.log(response);
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                })
            });
        });

    </script>
@endsection
