export const rowOperation = () => {
    const parentRows = document.getElementsByClassName('project-rows')
    const subRows = document.getElementsByClassName('sub-row')
    const buttons = document.getElementsByClassName('show-rows')

    function handleRow(id){
        for(let i = 0; i < subRows.length; i++){
            if(subRows[i].getAttribute('data-project') === id){
                
                subRows[i].classList.contains('hidden') ? subRows[i].classList.remove('hidden') : subRows[i].classList.add('hidden')
            }
        }
    }

    for(let i = 0; i < buttons.length; i++){
        const projectId = parentRows[i].id
        buttons[i].addEventListener('click', () => handleRow(projectId))
    }
}




