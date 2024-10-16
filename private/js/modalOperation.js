export const activateModals = () => {
    const OPEN = 'OPEN';
    const CLOSE = 'CLOSE';

    const newProjectBtn = document.getElementById('new-project-btn');
    const closeNewProjectModal = document.getElementById('close-new-project-modal');

    function handleModal(modalId, action){
        const modal = document.getElementById(modalId);
        console.log(modal.style)
        action === 'OPEN' ? modal.style.left = '0' : modal.style.left = '-100%';
    }

    newProjectBtn.addEventListener('click', () => handleModal('new-project-modal', OPEN));
    closeNewProjectModal.addEventListener('click', (e) => {
        e.preventDefault();
        handleModal('new-project-modal', CLOSE);
    });

    return;
}