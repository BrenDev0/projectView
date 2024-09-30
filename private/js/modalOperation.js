export const activateModals = () => {
    const OPEN = 'OPEN';
    const CLOSE = 'CLOSE';
    const newProjectBtn = document.getElementById('new-project-btn');
    const closeNewProjectModal = document.getElementById('close-new-project-modal');

    //const newIdeaBtn = document.getElementById('new-idea-btn');

    function handleModal(modalId, action){
        const modal = document.getElementById(modalId);
        action === 'OPEN' ? modal.style.left = '0' : modal.style.left = '-100%';
    }

    newProjectBtn.addEventListener('click', () => handleModal('new-project-modal', OPEN));
    closeNewProjectModal.addEventListener('click', (e) => {
        e.preventDefault();
        handleModal('new-project-modal', CLOSE);
    });

    //newIdeaBtn.addEventListener('click', () => handleModal('new-idea-modal', OPEN));

}