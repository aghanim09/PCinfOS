<!--iCalendar: --><!--iCalendar: --><!--iCalendar: -->

<!--include header-->
<?php
  $pageTitle = 'Calendar';
  include_once( "templates/header.php" );
?>

<div class="container">
    <h2> Tell us about your last couple of cycles!  </h2> <br>
</div>

<div class="container">
<div class="row justify-content-center">
    <div class="col-md-6">
    <div class="card">
        <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <button class="btn btn-link prev"><i class="bi bi-arrow-left"></i></button>
            <h5 class="mb-0 month-name"></h5>
            <button class="btn btn-link next"><i class="bi bi-arrow-right"></i></button>
        </div>
        </div>
        <div class="card-body">
        <div class="row">
            <div class="col text-center fw-bold">Su</div>
            <div class="col text-center fw-bold">Mo</div>
            <div class="col text-center fw-bold">Tu</div>
            <div class="col text-center fw-bold">We</div>
            <div class="col text-center fw-bold">Th</div>
            <div class="col text-center fw-bold">Fr</div>
            <div class="col text-center fw-bold">Sa</div>
        </div>
        <div class="row days">
        </div>
        </div>
    </div>
    </div>
</div>
</div>
</div>
<br>

<!-- Submit button -->
<div class="container"> 
    <a href="calendar.php" class="btn btn-outline-secondary float-right"> Done </a>
</div>




<script>
const calendar = document.querySelector('.card');
const monthName = calendar.querySelector('.month-name');
const daysContainer = calendar.querySelector('.days');

// Define current date
const currentDate = new Date();

// Define current month and year
let currentMonth = currentDate.getMonth();
let currentYear = currentDate.getFullYear();

// Array of months
const months = [
  'January',
  'February',
  'March',
  'April',
  'May',
  'June',
  'July',
  'August',
  'September',
  'October',
  'November',
  'December'
];

// Function to generate days of the current month
function generateDays() {
  // Clear existing days
  daysContainer.innerHTML = '';

  // Get the number of days in the current month
  const numDays = new Date(currentYear, currentMonth + 1, 0).getDate();

  // Get the index of the first day of the month
  const firstDayIndex = new Date(currentYear, currentMonth, 1).getDay();

  // Create blank days for previous month
  for (let i = 0; i < firstDayIndex; i++) {
    daysContainer.innerHTML += '<div class="col text-center"></div>';
  }

  // Create days for current month
  for (let i = 1; i <= numDays; i++) {
    const day = document.createElement('div');
    day.classList.add('col', 'text-center', 'fw-bold', 'day');
    day.textContent = i;
    daysContainer.appendChild(day);
  }
}

// Function to update the month name and generate the days
function updateCalendar() {
  monthName.textContent = months[currentMonth] + ' ' + currentYear;
  generateDays();
}

// Generate the calendar for the first time
updateCalendar();

// Add event listener for previous month button
const prevBtn = calendar.querySelector('.prev');
prevBtn.addEventListener('click', () => {
  currentMonth--;
  if (currentMonth < 0) {
    currentMonth = 11;
    currentYear--;
  }
  updateCalendar();
});

// Add event listener for next month button
const nextBtn = calendar.querySelector('.next-btn');
nextBtn.addEventListener('click', () => {
  // Code to display next month's calendar goes here
});

</script>

/* calendar */  
  #calendar {
    width: 220px;
    font-family: Arial, sans-serif;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  
  .month {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    background-color: #f2f2f2;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
  }
  
  .prev,
  .next {
    cursor: pointer;
    user-select: none;
    font-size: 20px;
  }
  
  .month-name {
    font-size: 16px;
    font-weight: bold;
    text-transform: uppercase;
  }
  
  .weekdays {
    display: flex;
    justify-content: space-between;
    padding: 10px;
    background-color: #f2f2f2;
    border-top: 1px solid #ccc;
    border-bottom: 1px solid #ccc;
  }
  
  .days {
    display: flex;
    flex-wrap: wrap;
    padding: 10px;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
  }
  
  .days div {
    width: 30px;
    height: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    user-select: none;
    margin: 2px;
  }
  
  .days div:hover:not(.selected) {
    background-color: #eee;
  }
  
  .days div.selected {
    background-color: #428bca;
    color: #fff;
  }











  main {
      flex: 1;
  }

  .navbar-fixed-bottom {
      position: fixed;
      bottom: 0;
      width: 100%;
      z-index: 9999; /* Adjust the z-index value as needed */

  }

  .navbar-container {
    display: flex;
    justify-content: center;
    align-items: center;
}

.navbar-brand {
    display: flex;
    align-items: center;
    margin-right: 15px;
}

.navbar-text {
    display: none;
}

@media (min-width: 992px) {
    .navbar-text {
        display: inline-block;
    }
}






/* button color */
.btn-outline-secondary {
    color: #668845 !important;
    border-color: #668845 !important;
}
        
/* button hover color */
.btn-outline-secondary:hover {
    background-color: #b1c69b !important;
}

/* responsive design for small screens */
@media (max-width: 576px) {
    #main-img {
        height: 200px;
        background-size: contain;
        background-repeat: no-repeat;
    }
}

.form-check-label {
   color: #222222 
}

.form-group{
    color: #83a85e 
}

label span {
    color: #222222;
  }

.form-control:focus {
    border-color: #506c45;
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
  }

  .navbar-container {
    display: flex;
    align-items: center;
}
.navbar-brand {
    display: flex;
    align-items: center;
    margin-right: 20px;
}

#F7F7EF

b6b697


   <!--fonts-->
   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nothing+You+Could+Do&display=swap" rel="stylesheet">


    #header-img {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 150px; 
        background-size: cover;
        background-position: center;
    }