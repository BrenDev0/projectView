const projectPage = () =>{
   const componentsCon = document.getElementById('components-list');
   const notePad = document.getElementById('project-notes');
   const componentSelect = document.getElementById('mobile-component-list')

   // render project components to con

   projectData.map((item) =>{
    const name = item.name;
    const id = item.part_id;
    
    // Create elements with attributes
    const nameButton = document.createElement('button');
    nameButton.setAttribute('class', 'h-con ha-start va-center project-component');
    nameButton.setAttribute('id', id);
    nameButton.addEventListener('click', () => showComponentData(id))

    //creat mobile elements
    const mobileComponentOption = document.createElement('option');
    mobileComponentOption.setAttribute('value', id)
    componentSelect.addEventListener('change', (e) => showComponentData(e.target.value))
    // Set names
   const nameContent = document.createTextNode(name);
   nameButton.textContent = name
   mobileComponentOption.appendChild(nameContent)
   
   
   // insert to DOM
   componentSelect.append(mobileComponentOption)
   componentsCon.append(nameButton); 
   });

   // Set select on page render
   const projectComponents = document.getElementsByClassName('project-component');
   if(projectComponents.length > 0){
       
       showComponentData(projectComponents[0].id);
   }



   notesBtn.addEventListener('click', dtViewNotes);

   // show save button on notes edit 
   notePad.addEventListener('keypress', () => {
    const saveNotesBtn = document.getElementById('save-notes');
    if(notes == notePad.value){
        saveNotesBtn.style.display = 'none'
    }else{
        saveNotesBtn.style.display = 'block'
    }
   })

   return;

   // render component data
   function showComponentData(id){
    // clear selected classname
    for(let i = 0; i < projectComponents.length; i++){
        projectComponents[i].className = projectComponents[i].className.replace(' component-selected', '');
    }
    const selectedComponent = document.getElementById(id);
    selectedComponent.className += ' component-selected';

    const component = projectData.find((comp) => comp.part_id == id);
    const hoursNode = document.createTextNode(`${component.hours} Hours`);
    const hiddenId = document.getElementsByClassName('hidden-component-id');
    const hours = document.getElementById('hours');
    const checkList = document.getElementById('list');
    clearParent(hours);
    clearParent(checkList);
    
    //set id to hidden inputs
    for(let i = 0; i < hiddenId.length; i++){
        hiddenId[i].value = parseInt(id);
    }

    hours.append(hoursNode);
    checklistData.map((item) => {
        if(item.component == id){
            const li = document.createElement('li')
            const box = document.createElement('input')
            const label = document.createElement('label')
            label.appendChild(document.createTextNode(item.item));
            box.type = 'checkbox'
            box.name = 'list_items[]'
            box.value = item.item_id;
            li.className = 'checklist-item h-con ha-start va-center'
            li.append(box);
            li.append(label)
            checkList.append(li)
        }
    })

    return;
   }


   // clearing containers
   function clearParent(parent){
    while(parent.lastChild){
        parent.removeChild(parent.lastChild);
    }
   }


}



// render on load
document.addEventListener('DOMContentLoaded', () => {
    projectPage();
    console.log('Project data Loaded.');
})