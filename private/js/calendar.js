export function createCalendar(month = new Date().getMonth() + 1, year = new Date().getFullYear()){
    const startingSpaces = new Date(`${month}/01/${year}`).getDay();
    const totalDays = daysInMonth(year, month);
    const endingSpaces = new Date(`${month}/${totalDays}/${year}`).getDay();
    const calendar = document.getElementById('days-con');
    let rowStart = 1;

    for(let i = 0; i < startingSpaces; i++){
        let colEnd = i + 1;
        const space = document.createElement('div');
        space.setAttribute('class', 'day');
        space.style.gridColumnStart = i;
        space.style.gridColumnEnd = colEnd;
        space.style.gridRowStart = 1;
        space.style.gridRowEnd = 2;
        calendar.append(space);
    }
    for(let i = 1; i < totalDays + 1; i++){
        let rowEnd = rowStart + 1;
        let colStart =  new Date(`${month}/${i}/${year}`).getDay();
        let colEnd = colStart + 1;
        const day = document.createElement('div');
        day.setAttribute('class', 'day');
        day.style.gridColumnStart = colStart;
        day.style.gridColumnEnd = colEnd;
        day.style.gridRowStart = rowStart;
        day.style.gridRowEnd = rowEnd;
        const dayNumber = document.createTextNode(i);
        day.appendChild(dayNumber);
        calendar.append(day);

        if(colStart == 6){
            rowStart = rowStart + 1;
        }
    }
    for(let i = endingSpaces + 1; i < 7; i++){
        let rowEnd = rowStart + 1;
        let colEnd = i + 1;
        const space = document.createElement('div');
        space.setAttribute('class', 'day');
        space.style.gridColumnStart = i;
        space.style.gridColumnEnd = colEnd;
        space.style.gridRowStart = rowStart;
        space.style.gridRowEnd = rowEnd;
        calendar.append(space);
    }

    return
}

function daysInMonth(year, month){
    return new Date(year, month, 0).getDate();
}

document.addEventListener('DOMContentLoaded', () => {
    createCalendar();
    console.log('Calendar Loaded.')
})
