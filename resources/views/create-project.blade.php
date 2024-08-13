<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Tracker</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite('resources/js/app.js')
    <script src="{{ asset('/assets/js/projects.js') }}"></script>
    <style>
        *{
            overflow-x: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fuild vh-100 ">
        <div class="row h-100">
            <div class="col-3">
                @include('sidebar',['project'=>$pro])
            </div>
            <div class="col-9">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <h1 class="py-4">Create Project </h1>
                <div id="message-info" class="alert alert-success w-50 d-none"></div>
                    <form id="project-form" class="w-50" onsubmit="return submitForm(event)">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" name="project_title" id="title" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="form-label">Description:</label>
                            <textarea name="project_description" id="description" class="form-control" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="date" class="form-label">Date:</label>
                            <input type="date" name="project_date" id="date" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Create Project</button>
                    </form>
                    <div id="proj" class="mt-3 h-6"></div>
                    </div>
            </div>
        </div>
    </div>
</body>
</html>
