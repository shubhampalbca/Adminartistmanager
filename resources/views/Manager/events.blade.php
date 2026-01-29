<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Posts - Manager</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .btn-add-post {
            float: right;
        }

        .name-max-width {
            max-width: 120px;
        }

        .max-width {
            max-width: 200px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('Managerdashboard') }}">Manager</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('Managerdashboard') }}">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('managerprofile') }}">Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('manager/events') }}">My Posts</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('manager_logout') }}">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-table me-1"></i> My Posts</span>
                <button type="button" class="btn btn-primary btn-add-post" data-toggle="modal" data-target="#addPostModal">Add Post</button>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Photo / Video</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td class="max-width">{{ Str::limit($item->description, 80) }}</td>
                            <td class="name-max-width">
                                @if(!empty($item->file))
                                @if (pathinfo($item->file, PATHINFO_EXTENSION) == 'mp4')
                                <video width="120" height="120" controls>
                                    <source src="{{ asset('uploads/' . $item->file) }}" type="video/mp4">
                                </video>
                                @else
                                <img src="{{ asset('uploads/' . $item->file) }}" alt="Post" width="80" height="80">
                                @endif
                                @else
                                <span class="text-muted small">No file</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal fade" id="addPostModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Post</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('manager/events') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Title:</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                            </div>
                            <div class="form-group">
                                <label>Photo or Video:</label>
                                <input type="file" class="form-control" name="file" accept="image/*,video/mp4">
                            </div>
                            <div class="form-group">
                                <label>Description:</label>
                                <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    @endif

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>