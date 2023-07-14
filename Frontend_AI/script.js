document.addEventListener("DOMContentLoaded", function() {
    // Data for each symptom
    const acneRatings = [5, 5, 4, 5, 5, 5, 4, 4, 5, 3, 2, 1, 2, 3, 4, 5, 5, 5, 5, 5, 5, 5, 4, 3, 3, 2, 3, 4, 5];
    const weightData = [5, 5, 4, 4, 4, 4, 3, 3, 3, 3, 2, 2, 2, 2, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
    const menstruationData = [1, 1, 1, 1, 1, 1, 1, 1, 4, 5, 5, 5, 5, 5, 5, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
    const hairLossData = [1, 1, 2, 2, 2, 2, 3, 3, 3, 3, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5];
    const hairGrowthData = [3, 3, 3, 3, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5];
    
    // Get the canvas element
    const canvas = document.getElementById("line-chart");
  
    // Create the chart using Chart.js library
    const chart = new Chart(canvas, {
      type: "line",
      data: {
        labels: Array.from({ length: acneRatings.length }, (_, i) => (i + 1).toString()), // Generate labels as day numbers
        datasets: [
          {
            label: "Acne Symptoms",
            data: acneRatings,
            fill: false,
            borderColor: "rgb(255, 204, 153)" ,
            tension: 0.1
          },
          /* {
            label: "Weight",
            data: weightData,
            fill: false,
            borderColor: "rgb(107, 142, 135)",
            tension: 0.1
          },*/ 
          {
            label: "Menstruation",
            data: menstruationData,
            fill: false,
            borderColor:  "rgb(249, 168, 131)",
            tension: 0.1
          },
          {
            label: "Hair loss",
            data: hairLossData,
            fill: false,
            borderColor:  "rgb(185, 218, 190)",
            tension: 0.1
          },
          /* {
            label: "Hair growth",
            data: hairGrowthData,
            fill: false,
            borderColor: "rgb(238, 230, 153)",
            tension: 0.1
          } */
        ]
      },
      options: {
        scales: {
          x: {
            display: true,
            title: {
              display: true,
              text: 'Date'
            }
          },
          y: {
            display: true,
            title: {
              display: true,
              text: 'Symptom Rating'
            },
            min: 1,
            max: 5,
            ticks: {
              stepSize: 1
            }
          }
        }
      }
    });
  });
