<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css','resources/js/app.js'])

    <!-- Title -->
    <title>@yield('title', config('app.name', 'Ponpes-Al-Mazaya'))</title>

    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link rel="icon" href="{{ asset('images/logo-only.ico') }}" type="image/x-icon">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        p {
            font-size: 1rem !important;
        }

        .font-family-karla {
            font-family: karla;
        }

        .bg-sidebar {
            background: #ffffff;
        }

        .active-nav-link {
            background: #379777;
            color: #ffffff;
        }

        .nav-item {
            transition: all 1s ease-in-out !important;
        }

        .nav-item:hover {
            background: #ffffff;
            color: #379777;
        }
        
    </style>
</head>

<body class="flex bg-gray-100 font-family-karla">
    @include('layouts.sidebar')

    <div class="flex flex-col w-full h-screen overflow-y-hidden">

        <!-- Desktop Header -->
        <header class="items-center w-full ">
            @include('layouts.navigation')
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full px-6 py-5 bg-sidebar sm:hidden">
            <div class="flex items-center justify-between">
                <a href="index.html" class="text-3xl font-semibold text-black uppercase hover:text-gray-300">Admin</a>
                <button @click="isOpen = !isOpen" class="text-3xl text-black focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                <a href="index.html" class="flex items-center py-2 pl-4 text-black active-nav-link nav-item">
                    <i class="mr-3 fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
                <a href="blank.html" class="flex items-center py-2 pl-4 text-black opacity-75 hover:opacity-100 nav-item">
                    <i class="mr-3 fas fa-sticky-note"></i>
                    Blank Page
                </a>
                <a href="tables.html" class="flex items-center py-2 pl-4 text-black opacity-75 hover:opacity-100 nav-item">
                    <i class="mr-3 fas fa-table"></i>
                    Tables
                </a>
                <a href="forms.html" class="flex items-center py-2 pl-4 text-black opacity-75 hover:opacity-100 nav-item">
                    <i class="mr-3 fas fa-align-left"></i>
                    Forms
                </a>
            </nav>
        </header>

        <div class="flex flex-col w-full overflow-x-hidden border-t">
            <main class="flex-grow w-full p-8">
                {{ $slot }}
            </main>
        </div>
    </div>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const yearInput = document.getElementById('yearInput');
            const totalStudent = document.getElementById('totalStudent');
            const totalStudent2 = document.getElementById('totalStudent2');
            let chartBar;
            let chartLine;

            function calculateMaxValue(data, padding = 80) {
                const maxTotal = Math.max(...data.map(item => item.total));
                return maxTotal + padding;
            }

            function fetchAndRenderChartBar(year) {
                fetch(`/chart-data?year=${year}`) // Match the Laravel route parameter name
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        const labels = data.map(item => item.tingkatan)
                        const totals = data.map(item => item.total);
                        const maxY = calculateMaxValue(data);

                        // Destroy previous charts if they exist
                        if (chartBar) {
                            chartBar.destroy();
                        }

                        // Render Bar Chart
                        chartBar = new Chart(totalStudent, {
                            type: 'bar',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Total Students',
                                    data: totals,
                                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: true,
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        max: maxY,
                                        ticks: {
                                            stepSize: 50
                                        },
                                    },
                                    x: {
                                        ticks: {
                                            autoSkip: false,
                                            maxRotation: 45, // Rotate labels for better visibility
                                            minRotation: 0
                                        }
                                    }
                                },
                                plugins: {
                                    legend: {
                                        display: true,
                                        position: 'top'
                                    }
                                }
                            }
                        });
                    })
                    .catch(error => console.error('Error fetching data:', error));
            }

            yearInput.addEventListener('blur', () => {
                const year = yearInput.value.trim();
                if (year) {
                    fetchAndRenderChartBar(year); // Corrected function name
                }
            });

            function fetchAndRenderLineChart() {
                fetch(`/chart-data2`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        const years = [...new Set(data.map(item => item.tahun))].sort(); // Get unique years, sorted
                        const order = ['MTS', 'MA', 'Santri Pondok']; // Custom order for tingkatan
                        const maxY = calculateMaxValue(data);

                        // Create datasets for each tingkatan
                        const datasets = order.map(tingkatan => {
                            const tingkatanData = data.filter(item => item.tingkatan === tingkatan);
                            const totals = years.map(year => {
                                const entry = tingkatanData.find(d => d.tahun === year);
                                return entry ? parseInt(entry.total, 10) : 0; // Default to 0 if no data for that year
                            });

                            // Line colors for each tingkatan
                            const colors = {
                                'MTS': 'rgba(54, 162, 235, 1)',
                                'MA': 'rgba(75, 192, 192, 1)',
                                'Santri Pondok': 'rgba(255, 99, 132, 1)'
                            };
                            const bgColors = {
                                'MTS': 'rgba(54, 162, 235, 0.2)',
                                'MA': 'rgba(75, 192, 192, 0.2)',
                                'Santri Pondok': 'rgba(255, 99, 132, 0.2)'
                            };

                            return {
                                label: tingkatan,
                                data: totals,
                                fill: true,
                                borderColor: colors[tingkatan],
                                backgroundColor: bgColors[tingkatan],
                                tension: 0.4
                            };
                        });

                        // Destroy the old chart if it exists
                        if (chartLine) {
                            chartLine.destroy();
                        }

                        // Render the line chart
                        chartLine = new Chart(totalStudent2, {
                            type: 'line',
                            data: {
                                labels: years,
                                datasets: datasets
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        max: maxY,
                                        ticks: {
                                            stepSize: 100
                                        },
                                    },
                                    x: {
                                        ticks: {
                                            autoSkip: false,
                                            maxRotation: 45,
                                            minRotation: 0
                                        }
                                    }
                                },
                                plugins: {
                                    legend: {
                                        display: true,
                                        position: 'top'
                                    }
                                }
                            }
                        });
                    })
                    .catch(error => console.error('Error fetching data:', error));
            }


            fetchAndRenderLineChart();

            const defaultYear = new Date().getFullYear() - 1;
            yearInput.value = defaultYear;
            fetchAndRenderChartBar(defaultYear);
            submitYearButton.addEventListener('click', () => {
                const year = yearInput.value.trim();
                if (year) {
                    fetchAndRenderChartBar(year);
                } else {
                    alert('Please enter a valid year.');
                }
            });
        });
    </script>

</body>

</html>