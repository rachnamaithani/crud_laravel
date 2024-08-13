<div class="bg-secondary text-light vh-100 p-5">
    <p class="h5 pb-3">Project Tracker</p>

    <div class="h6 d-flex align-items-center">
        <a href="{{url('./create-projects')}}" class= "p-3 btn btn-success"><i class="fa fa-plus" style="font-size:16px;color:#fff">  </i>  Add a new Project</a>
    </div>
    <div class="">
        <button class="btn btn-sm" onclick="fetchAndRenderProjects()">Refresh</button>
        <ul class="list-unstyled ms-4" id="projects">
        </ul>
    </div>
</div>

