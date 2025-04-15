<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <style>
        img{
            border-radius: 50%;
        }
    </style>
</head>
<body class="bg-light py-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="mb-0">All Applicant</h1>
            <a href="{{ route('mail.jobApplication') }}" class="btn btn-success">Apply For Job</a>
        </div>

        @include('message')

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Number</th>
                        <th>Education</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Profile Picture</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applicants as $applicant)
                        <tr>
                            <td>{{ $applicant->id }}</td>
                            <td>{{ $applicant->name }}</td>
                            <td>{{ $applicant->age }}</td>
                            <td>{{ $applicant->number }}</td>
                            <td>{{ $applicant->education }}</td>
                            <td>{{ $applicant->email }}</td>
                            <td>{{ $applicant->role }}</td>
                            <td>
                                @if($applicant->profileImage && $applicant->profileImage != null)
                                    <img src="{{ asset('/storage/' . $applicant->profileImage) }}" alt="Profile" class="img-thumbnail" width="100">
                                @else
                                   <img src="data:image/jpeg;base64,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" alt="" width="50px">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('post.edit', $applicant->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('post.destroy', $applicant->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="footer">
            {{$applicants->links()}}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>