<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Tracker</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite('resources/js/app.js')
</head>
<body>
    <div class="container-fuild vh-100 ">
        <div class="row h-100">
            <div class="col-3">
                @include('sidebar',['project'=>$pro])
            </div>
            <div class="col-9 position-relative">
                <div class="text-center position-absolute" style="left:30%;top:30%;">
                        <img src="{{ asset('images/Task.jpg') }}" alt="logo"  width="50" height="50"/>
                        <h4>No Project Selected </h4>
                        <p>select a project or get started with a new one</p>
                   <a href="{{url('./create-projects')}}" class= "btn btn-success">Add a new Project</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


