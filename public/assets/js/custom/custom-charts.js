document.addEventListener('DOMContentLoaded', () => {
    const barChartColors = {
        gold: {
            bg: 'rgba(255, 107, 53, 0.6)',      // Orange
            border: 'rgba(255, 107, 53, 1)'
        },
        silver: {
            bg: 'rgba(30, 58, 138, 0.6)',       // Blue
            border: 'rgba(30, 58, 138, 1)'
        },
        bronze: {
            bg: 'rgba(239, 68, 68, 0.6)',       // Red
            border: 'rgba(239, 68, 68, 1)'
        }
    };
    
    // Data untuk Bar Chart (contoh)
    const barChartData = {
        labels: ['Sepak Bola', 'Badminton', 'Renang', 'Basket', 'Voli', 'Atletik'],
        datasets: [{
            label: 'Emas',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: barChartColors.gold.bg,
            borderColor: barChartColors.gold.border,
            borderWidth: 1.5,
            borderRadius: 8,
        }, {
            label: 'Perak',
            data: [10, 15, 7, 3, 6, 5],
            backgroundColor: barChartColors.silver.bg,
            borderColor: barChartColors.silver.border,
            borderWidth: 1.5,
            borderRadius: 8,
        }, {
            label: 'Perunggu',
            data: [20, 10, 15, 12, 8, 11],
            backgroundColor: barChartColors.bronze.bg,
            borderColor: barChartColors.bronze.border,
            borderWidth: 1.5,
            borderRadius: 8,
        }]
    };

    // Data untuk Pie Chart (sesuai data di HTML)
    const pieChartData = {
        labels: ['Emas', 'Perak', 'Perunggu'],
        datasets: [{
            data: [45, 46, 60],
            backgroundColor: [barChartColors.gold.bg, barChartColors.silver.bg, barChartColors.bronze.bg],
            borderColor: [barChartColors.gold.border, barChartColors.silver.border, barChartColors.bronze.border],
            borderWidth: 2,
        }]
    };

    // --- Inisialisasi Chart ---

    // Bar Chart
    const barChartEl = document.getElementById('barChartCustomHome');
    if (barChartEl) {
        const barCanvas = document.createElement('canvas');
        barChartEl.innerHTML = ''; 
        barChartEl.appendChild(barCanvas);

        new Chart(barCanvas, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(200, 200, 200, 0.2)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    }
                },
                animation: {
                    duration: 1000,
                    easing: 'easeInOutQuart'
                }
            }
        });
    }

    // Pie Chart
    const pieChartEl = document.getElementById('pieChart');
    if (pieChartEl) {
        new Chart(pieChartEl, {
            type: 'doughnut',
            data: pieChartData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '75%',
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        enabled: true
                    }
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        });
    }

     // Bar Chart Prestasi
     const barChartPrestasiEl = document.getElementById('barChartPrestasi');
     if (barChartPrestasiEl) {
         const barCanvas = document.createElement('canvas');
         barChartPrestasiEl.innerHTML = '';
         barChartPrestasiEl.appendChild(barCanvas);
 
         new Chart(barCanvas, {
             type: 'bar',
             data: barChartData, // Menggunakan data yang sama untuk contoh
             options: {
                 responsive: true,
                 maintainAspectRatio: false,
                 scales: {
                     y: {
                         beginAtZero: true,
                         grid: {
                             color: 'rgba(200, 200, 200, 0.2)'
                         }
                     },
                     x: {
                         grid: {
                             display: false
                         }
                     }
                 },
                 plugins: {
                     legend: {
                         position: 'top',
                     },
                     tooltip: {
                         mode: 'index',
                         intersect: false,
                     }
                 },
                 animation: {
                     duration: 1000,
                     easing: 'easeInOutQuart'
                 }
             }
         });
     }
 
     // Pie Chart Prestasi
     const pieChartPrestasiEl = document.getElementById('pieChartPrestasi');
     if (pieChartPrestasiEl) {
         new Chart(pieChartPrestasiEl, {
             type: 'doughnut',
             data: pieChartData, // Menggunakan data yang sama untuk contoh
             options: {
                 responsive: true,
                 maintainAspectRatio: false,
                 cutout: '75%',
                 plugins: {
                     legend: {
                         display: false
                     },
                     tooltip: {
                         enabled: true
                     }
                 },
                 animation: {
                     animateScale: true,
                     animateRotate: true
                 }
             }
         });
     }
});

document.addEventListener('DOMContentLoaded', () => {
    const sportFilter = document.getElementById('sportFilter');
    const schoolFilter = document.getElementById('schoolFilter');
    const athleteTable = document.getElementById('athleteTable');
    const tableRows = athleteTable.querySelectorAll('tbody tr');

    function filterTable() {
        const sportValue = sportFilter.value.toLowerCase();
        const schoolValue = schoolFilter.value.toLowerCase();

        tableRows.forEach(row => {
            const sport = row.dataset.sport.toLowerCase();
            const school = row.dataset.school.toLowerCase();
            
            const shouldShow = (sportValue === '' || sport.includes(sportValue)) &&
                               (schoolValue === '' || school.includes(schoolValue));
            
            row.style.display = shouldShow ? '' : 'none';
        });
    }

    sportFilter.addEventListener('change', filterTable);
    schoolFilter.addEventListener('change', filterTable);
}); 