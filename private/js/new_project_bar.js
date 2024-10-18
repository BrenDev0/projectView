export const formBarOperation = () => {
    const btn = document.getElementById('dt-new-project');

    const handleFormBar = () => {
        const formBar = document.getElementById('new-project-bar');
    
        btn.innerText === 'New Project' ? btn.innerText = "Cancel" : btn.innerText = 'New Project';
        window.getComputedStyle(btn).color === 'rgb(21, 39, 51)' ? btn.style.color = 'red' : btn.style.color = 'rgb(21, 39, 51)';
        window.getComputedStyle(formBar).display === 'none' ? formBar.style.display = 'flex' : formBar.style.display = 'none';
        
        return;
    }

    btn.addEventListener('click', handleFormBar);
    return;
}



