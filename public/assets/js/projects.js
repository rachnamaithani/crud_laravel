const fetchAndRenderProjects = async () => {
    const response = await fetch("/api/projects");

    const projectsList = await response.json();

    const { projects } = projectsList;

    const projectUl = document.getElementById('projects');

    projectUl.innerHTML = projects.map(project => `<li>${project.project_title}<li>`).join('');
}
