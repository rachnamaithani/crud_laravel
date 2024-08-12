<div class="bg-secondary text-light vh-100 p-5">
    <p class="h5 pb-3">Project Tracker</p>

    <div class="h6 d-flex align-items-center">
        <a href="{{url('./create-projects')}}" class= "p-3 btn btn-success"><i class="fa fa-plus" style="font-size:16px;color:#fff">  </i>  Add a new Project</a>
    </div>
    <div class="">
        <ul class="list-unstyled ms-4">
            @if($project->isNotEmpty())
                @foreach($project as $project)
                    <a href="{{route('projectbyid.show',['project_id'=>$project->project_id])}}" class="text-light text-decoration-none"><li class="mb-2 ">{{ $project->project_title }}</li></a>
                @endforeach
            @endif
        </ul>
    </div>
</div>

