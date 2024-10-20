const projectPage = () =>{
   const componentsCon = document.getElementById('project-components-con');
   const notePad = document.getElementById('project-notes');


   // render project components to con

   projectData.map((item) =>{
    const name = item.name;
    const id = item.id;
    const nameDiv = document.createElement('button');
    nameDiv.setAttribute('class', 'h-con ha-start va-center project-component');
    nameDiv.setAttribute('id', id);
   const nameContent = document.createTextNode(name);
   nameDiv.appendChild(nameContent);
   componentsCon.append(nameDiv);
   });

   // render project notes 
   notePad.addEventListener('keypress', () => {
    const saveNotesBtn = document.getElementById('save-notes');
    if(notes == notePad.value){
        saveNotesBtn.style.display = 'none'
    }else{
        saveNotesBtn.style.display = 'block'
    }
   })
   return;
}



// render on load
document.addEventListener('DOMContentLoaded', () => {
    projectPage();
    console.log('Project data Loaded.');
})