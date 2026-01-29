<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $manager->name ?? 'Profile' }} - Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('Managerdashboard') }}">{{ $manager->name ?? 'Manager' }}</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('Managerdashboard') }}">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('manager_logout') }}">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        <h2>{{ $manager->name ?? 'Profile' }}</h2>
        <div class="card">
            <div class="card-body">
                @if(!empty($manager->name))
                <p><strong>Name:</strong> {{ $manager->name }}</p>
                @endif
                @if(!empty($manager->username))
                <p><strong>Username:</strong> {{ $manager->username }}</p>
                @endif
                @if(!empty($manager->email))
                <p><strong>Email:</strong> {{ $manager->email }}</p>
                @endif
                @if(!empty($manager->mobile))
                <p><strong>Mobile:</strong> {{ $manager->mobile }}</p>
                @endif
                @if(!empty($manager->gender))
                <p><strong>Gender:</strong> {{ ucfirst(str_replace('_', ' ', $manager->gender)) }}</p>
                @endif
            </div>
        </div>
        <a href="{{ route('Managerdashboard') }}" class="btn btn-secondary mt-3">Back to Dashboard</a>
    </div>
</body>

</html>