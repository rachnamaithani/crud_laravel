const fetchAndRenderProjects = async () => {
    const response = await fetch("/api/projects");

    const projectsList = await response.json();

    const { projects } = projectsList;

    const projectUl = document.getElementById('projects');

    projectUl.innerHTML = projects.map(project => `<li>${project.project_title}<li>`).join('');
}

const submitForm = async (event) =>{

    event.preventDefault();

    const form = event.target;
    const formData = new FormData(form);

    const response = await fetch('/api/save-projects',
        {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: formData
        });

        const result = await response.json();
        console.log(result);

        if (response.ok)
            {
            document.getElementById('message-info').classList.remove('d-none');
            document.getElementById('message-info').innerHTML = result.message;

            const projectList = document.getElementById('proj');
            const newProject = `
                    <p>Title = ${formData.get('project_title')}</p>
                    <p>Description  = ${formData.get('project_description')}</p>
                    <p>Date = ${formData.get('project_date')}</p>`;
            projectList.innerHTML += newProject;

            form.reset();
        }
        else
         {
           document.getElementById('message-info').classList.remove('d-none');
           document.getElementById('message-info').innerHTML = result.errors;
        }
        setTimeout(() => {
            document.getElementById('message-info').classList.add('d-none');
        }, 5000);
};
