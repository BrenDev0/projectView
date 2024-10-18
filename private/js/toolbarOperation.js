export const toolbarOperation = () => {
    const OPEN = 'OPEN';
    const CLOSE = 'CLOSE';
    // new project modal toggle
    const newProjectBtn = document.getElementById('new-project-btn');
    const closeNewProjectModal = document.getElementById('close-new-project-modal');
    function handleModal(modalId, action){
        const modal = document.getElementById(modalId);
        action === 'OPEN' ? modal.style.left = '0' : modal.style.left = '-100%';
    }

    newProjectBtn.addEventListener('click', () => handleModal('new-project-modal', OPEN));
    closeNewProjectModal.addEventListener('click', (e) => {
        e.preventDefault();
        handleModal('new-project-modal', CLOSE);
    });

    // show tasks
    const tasksBtn = document.getElementById('todays-tasks-btn');
    const tasks = document.getElementById('tasks-con');
    const projectsTable = document.getElementById('projects-table');
    const viewTasks = () => {
        window.getComputedStyle(projectsTable).display === 'none' ? projectsTable.style.display = 'block' :projectsTable.style.display = 'none';
        window.getComputedStyle(tasks).display === 'none' ? tasks.style.display = 'flex' : tasks.style.display = 'none'; 
        tasksBtn.innerText === "Today" ? tasksBtn.innerText = 'Projects' : tasksBtn.innerText = 'Today'
    }

    tasksBtn.addEventListener('click', viewTasks)

    

    return;
}