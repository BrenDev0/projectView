export function createCalendar(month = new Date().getMonth() + 1, year = new Date().getFullYear()){
    const startingSpaces = new Date(`${month}/01/${year}`).getDay();
    const totalDays = daysInMonth(year, month);
    const endingSpaces = new Date(`${month}/${totalDays}/${year}`).getDay();
    const calendar = document.getElementById('days-con');
    const monthSelect = document.getElementById('month-select');
    const yearSelect = document.getElementById('year-select');


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
        let width = window.innerWidth;
        const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        const short = ['S', 'M', 'T', 'W', 'T', 'F', 'S']
        let colEnd = i + 1;
        const weekDay = document.createElement('div');
        const content = width > 900 ? document.createTextNode(days[i]) : document.createTextNode(short[i]);
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

        // set grid location
        let rowEnd = rowStart + 1;
        let colStart =  new Date(`${month}/${i}/${year}`).getDay();
        let colEnd = colStart + 1;

        // create buttons
        const day = document.createElement('button');
        // attributes/data
        day.setAttribute('class', 'day');
        day.setAttribute('value', i);

        day.addEventListener('click', () => addCalendarItem(year, month, i));

        // set grid positions
        day.style.gridColumnStart = colStart;
        day.style.gridColumnEnd = colEnd;
        day.style.gridRowStart = rowStart;
        day.style.gridRowEnd = rowEnd;
        // add day number 
        let dayNumber = document.createElement('p');
        dayNumber.appendChild(document.createTextNode(i));
        day.append(dayNumber);
        calendar.append(day);

        // calendarData is a json_encoded php variable located on calendar_page.php script tag
        let events = calendarData.filter((item) => {
            return item.year == year && item.month == month && item.day == i;
        })

        // if events render number of events to calendar
        if(events.length > 0){
            let calendarItem = document.createElement('p');
            calendarItem.appendChild(events.length > 1 ? document.createTextNode(`${events.length} items`)  : document.createTextNode(`${events.length} item`));
            calendarItem.style.color = 'red';
            calendarItem.style.marginTop = '10px';
            day.append(calendarItem);
        }

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

// adding items to calendar
function addCalendarItem(year, month, day){
    const modal = document.getElementById('event-modal');
    const itemsCon = document.getElementById('items-con');
    const formDataYear = document.getElementById('hidden-year');
    const formDataMonth = document.getElementById('hidden-month');
    const formDataDay = document.getElementById('hidden-day');

    // create items title
    const itemsTitle = document.createElement('h1');
    itemsTitle.appendChild(document.createTextNode(`Items for ${day}/${month}/${year}`));
    itemsCon.append(itemsTitle); 

    // check calendar for items
    calendarData.map((item) => {
        // if items render to DOM
        if(item.day == day && item.month == month && item.year == year){
            let itemDiv = document.createElement('div');
            itemDiv.setAttribute('class', 'h-con calendar-item');

            let dataTitle = document.createElement('h3');
            dataTitle.appendChild(document.createTextNode(item.title));

            let dataDescription = document.createElement('p');
            dataDescription.appendChild(document.createTextNode(item.description));

            itemDiv.append(dataTitle);
            itemDiv.append(dataDescription);
            itemsCon.append(itemDiv);
        }
    })
    

    // open modal
    modal.style.display = 'flex';

    // set data to hiddent elements for form
    formDataYear.setAttribute('value', year);
    formDataMonth.setAttribute('value', month);
    formDataDay.setAttribute('value', day); 

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
