<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5 mail-container mb-5">
        <div class="text-center mb-4">
            <div class="form-header p-4 border rounded shadow-sm bg-light">
                <h3>Apply for Internship</h3>
            </div>
        </div>
        @include('message')
        <form action="{{route('mail.jobMail')}}" method="post" class="p-4 border rounded shadow-sm bg-light mb-5">
            @csrf
            <div class="mb-3">
                <label for="sanderName" class="form-label">Your Name</label>
                <input type="text" name="sanderName" id="sanderName" class="form-control" placeholder="Enter your name" value="{{old('sanderName')}}">
            </div>
            <div class="mb-3">
                <label for="sanderAge" class="form-label">Your Age</label>
                <input type="number" name="sanderAge" id="sanderAge" class="form-control" placeholder="Enter your age" value="{{old('sanderAge')}}">
            </div>
            <div class="mb-3">
                <label for="number" class="form-label">Mobile Number</label>
                <input type="number" name="number" id="number" class="form-control" placeholder="Enter your mobile number" value="{{old('number')}}">
            </div>
            <div class="mb-3">
                <label for="education" class="form-label">Education</label>
                <input type="text" name="education" id="education" class="form-control" placeholder="Your education" value="{{old('education')}}">
            </div>
            <div class="mb-3">
                <label for="sanderEmail" class="form-label">Email</label>
                <input type="email" name="sanderEmail" id="sanderEmail" class="form-control" placeholder="Enter your email" value="{{old('sanderEmail')}}">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea name="message" id="message" class="form-control" rows="4" placeholder="Enter your message"> {{old('message')}}</textarea>
            </div>
            <div class="mb-3">
                <label for="jobrole" class="form-label">Job Role</label>
                <select name="jobrole" id="jobrole" class="form-select">
                    <option value="Frontend Developer">Frontend Developer</option>
                    <option value="Backend Developer">Backend Developer</option>
                    <option value="React Developer">React Developer</option>
                    <option value="Flutter Developer">Flutter Developer</option>
                    <option value="Laravel Developer">Laravel Developer</option>
                    <option value="Node.js Developer">Node.js Developer</option>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit Form</button>
            </div>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>