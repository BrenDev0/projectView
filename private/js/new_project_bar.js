export const formBarOperation = () => {
    const btn = document.getElementById('dt-new-project');
    const cancel = document.getElementById('formbar-cancel-btn');

    const handleFormBar = () => {
        console.log('clicked')
        const formBar = document.getElementById('new-project-bar');

        window.getComputedStyle(btn).display === 'none' ? btn.style.display = 'flex' : btn.style.display = 'none';
        window.getComputedStyle(cancel).display === 'none' ? cancel.style.display = 'flex' : cancel.style.display = 'none';
        window.getComputedStyle(formBar).display === 'none' ? formBar.style.display = 'flex' : formBar.style.display = 'none';
        return;
    }

    btn.addEventListener('click', handleFormBar);
    cancel.addEventListener('click', handleFormBar);
    return;
}



