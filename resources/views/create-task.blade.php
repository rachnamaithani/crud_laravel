<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Tracker</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite('resources/js/app.js')
    <style>
        *{
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fuild vh-100 ">
        <div class="row h-100">
            <div class="col-3 h-100">
            @include('sidebar',['project'=>$pro])
            </div>
            <div class="col-9 h-100">
                <div class="w-25 mt-5">
                    @if(session('success'))
                        <div class="alert alert-success" id="success-alert">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                @if($project)
                <div class="container w-75 float-start">
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="me-5">
                                <p class="h2 text-uppercase">{{ $project->project_title }}</p>
                                <p class="font-weight-light font-italic">{{ $project->project_date}}</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <form  action="{{ route('project.delete',['project_id' => $project->project_id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            <button type="submit" class="btn btn-danger " onclick="return confirmDeleteProject({{$project->project_id}});"><i class="fa fa-trash-o pe-2 align-middle" style="font-size:25px"></i>DELETE</button>
                                </form>
                        </div>
                    </div>
                    <form action="{{route('task.create',['project_id'=>$project->project_id])}}" method="POST">
                        @csrf
                    <div class="row">
                        <div class="col-12">
                            <label for="task_text" class="h4 form-label">Task Name</label>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-6">
                            <input type="text" name="task" id="task_text" placeholder="enter task name" class="form-control w-75"/>
                        </div>
                        <div class="col-6">
                        <button type="submit" class="btn btn-success"><i class="fa fa-plus pe-1" style="font-size:30px align-middle" ></i>Add Task</button>
                        </div>
                    </div>
                    </form>
                    @if(isset($tasks) && $tasks->count() >0)
                        <div class="container">
                             @foreach($tasks as $task)
                            <div class="row mb-3">
                                <div class="col-6">
                                    <p class="h5 mt-2">{{ $task->task_name }}</p>
                                </div>
                                <div class="col-6">
                                    <form action="{{ route('task.delete',['task_id' => $task->task_id,'project_id' => $project ->project_id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirmDeleteTask({{$task->task_id}});" class="btn btn-danger"><i class="fa fa-trash-o pe-2 align-middle" style="font-size:25px"></i>DELETE</button>
                                    </form>
                                </div>
                             </div>
                             @endforeach
                         </div>
                         @else
                            <p>No tasks found for this project</p>
                        @endif
                </div>
                @else
                    <p>No project found</p>
                @endif
                </div>
            </div>
        </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                let alert = document.getElementById('success-alert');
                if (alert) {
                    alert.remove();
                }
            }, 2000);
        });
        function confirmDeleteProject() {
            return confirm('Are you sure you want to delete this project?');
        }

        function confirmDeleteTask(taskId) {
            return confirm('Are you sure you want to delete this task?');
        }
    </script>
</body>
</html>
