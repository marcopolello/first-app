import Chart from 'chart.js/auto'
import { getData } from './api.js';

(async function() {
  const data = await getData();

  new Chart(
    document.getElementById('chart'),
    {
      type: 'bar',
      options: {
        animation: false,
        plugins: {
          legend: {
            display: false
          },
          tooltip: {
            enabled: false
          }
        }
      },
      data: {
        labels: data.map(row => row.year),
        datasets: [
          {
            label: 'chart by year',
            data: data.map(row => row.count)
          }
        ]
      }
    }
  );
})();
