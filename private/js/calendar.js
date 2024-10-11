export function createCalendar(month = new Date().getMonth() + 1, year = new Date().getFullYear()){
    const startingSpaces = new Date(`${month}/01/${year}`).getDay();
    const totalDays = daysInMonth(year, month);
    const endingSpaces = new Date(`${month}/${totalDays}/${year}`).getDay();
    const calendar = document.getElementById('days-con');
    const monthSelect = document.getElementById('month-select');
    const yearSelect = document.getElementById('year-select')

    //add function to selects
    monthSelect.addEventListener('change', () => createCalendar(parseInt(monthSelect.value), parseInt(yearSelect.value)));
    yearSelect.addEventListener('change', () => createCalendar(parseInt(monthSelect.value), parseInt(yearSelect.value)));

    //clear calendar 
    clearCalendar(calendar, monthSelect, yearSelect);
    
    //populate date month select options
    for(let i = 1; i < 13; i++){
        if(i === month){
            let option = document.createElement('option');
            option.setAttribute('value', i);
            option.setAttribute('selected', 'selected');
            let content = document.createTextNode(getMonthName(i));
            option.append(content);
            monthSelect.append(option);
        }else {
            let option = document.createElement('option');
            option.setAttribute('value', i);
            let content = document.createTextNode(getMonthName(i));
            option.append(content);
            monthSelect.append(option);
        }
    }

    //populate year select options
    for(let i = 0; i < 5; i++){
        let option = document.createElement('option');
        let content = year + i;
        if (content === year){
            option.setAttribute('value', content);
            option.setAttribute('selected', 'selected');
            option.append(content);
            yearSelect.append(option);
        }else{
            option.setAttribute('value', content);
            option.append(content);
            yearSelect.append(option);
        }
    }

    //populate week day names
    for(let i = 0; i < 7; i++){
        const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        let colEnd = i + 1;
        const weekDay = document.createElement('div');
        const content = document.createTextNode(days[i]);
        weekDay.appendChild(content);
        weekDay.setAttribute('class', 'day-names');
        weekDay.style.gridColumnStart = i;
        weekDay.style.gridColumnEnd = colEnd;
        weekDay.style.gridRowStart = 0;
        weekDay.style.gridRowEnd = 1;
        calendar.append(weekDay);

    }

    let rowStart = 1;
    //populate calendar beginning spaces
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
    //populate calendar days
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
        //change row
        if(colStart == 6){
            rowStart = rowStart + 1;
        }
    }
    //populate ending spaces
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

// Get number of days in month
function daysInMonth(year, month){
    return new Date(year, month, 0).getDate();
}

// Get Month name
function getMonthName(monthNumber){
    const date = new Date();
    date.setMonth(monthNumber - 1);

    return date.toLocaleDateString('en-US', {month: 'long'})
}

// clearing calendar before render
function clearCalendar(calendar, selectMonth, selectYear){
    while(calendar.lastChild){
        calendar.removeChild(calendar.lastChild)
    }

    while(selectMonth.lastChild){
        selectMonth.removeChild(selectMonth.lastChild)
    }

    while(selectYear.lastChild){
        selectYear.removeChild(selectYear.lastChild)
    }
}

// render calendar on load
document.addEventListener('DOMContentLoaded', () => {
    createCalendar();
    console.log('Calendar Loaded.')
})
