const projectPage = () =>{
   const componentsCon = document.getElementById('project-components-con');
   const notePad = document.getElementById('project-notes');


   // render project components to con

   projectData.map((item) =>{
    const name = item.name;
    const id = item.part_id;
    // Create elements with attributes
    const nameButton = document.createElement('button');
    nameButton.setAttribute('class', 'h-con ha-start va-center project-component');
    nameButton.setAttribute('id', id);
    nameButton.addEventListener('click', () => showComponentData(id))
    // Set names
   const nameContent = document.createTextNode(name);
   nameButton.appendChild(nameContent);
   // insert to DOM
   componentsCon.append(nameButton);

 
   });

   // show save button on notes edit 
   notePad.addEventListener('keypress', () => {
    const saveNotesBtn = document.getElementById('save-notes');
    if(notes == notePad.value){
        saveNotesBtn.style.display = 'none'
    }else{
        saveNotesBtn.style.display = 'block'
    }
   })

   // render component data
   function showComponentData(id){
    const component = projectData.find((comp) => comp.part_id == id);
    const hoursNode = document.createTextNode(`${component.hours} Hours`);
    const hiddenId = document.getElementById('component-id');
    const hours = document.getElementById('hours');
    const checkList = document.getElementById('checklist');
    clearParent(hours);
    clearParent(checkList);
    hours.append(hoursNode);
    hiddenId.value = component.part_id
   }

   // clearing containers
   function clearParent(parent){
    while(parent.lastChild){
        parent.removeChild(parent.lastChild);
    }
   }

   return;
}



// render on load
document.addEventListener('DOMContentLoaded', () => {
    projectPage();
    console.log('Project data Loaded.');
})