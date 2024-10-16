const btn =  document.getElementById('dt-new-project');

export const handleFormBar = () => {
    const formBar = document.getElementById('new-project-bar')

    formBar.style.display === 'none' ? formBar.style.display = 'flex' : formBar.style.display = 'none';
}

btn.addEventListener('click', handleFormBar);