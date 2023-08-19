<!-- component -->
<!DOCTYPE html>
<html lang="es">
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="flex flex-col h-screen bg-gray-100">

    <!-- Barra de navegación superior -->
    <div class="bg-white text-white shadow w-full p-2 flex items-center justify-between">
        <div class="flex items-center">
            <div class="flex items-center">
                <h2 class="font-bold text-xl text-gray-500">IDI</h2>
            </div>
            {{-- Medium Screens --}}
            <div class="md:hidden flex items-center"> 
                <button id="menuBtn">
                    <i class="fas fa-bars text-gray-500 text-lg"></i> <!-- Ícono de menú -->
                </button>
            </div>
        </div>

        <!-- Ícono de Notificación y Perfil -->
        <div class="space-x-5">
            <button>
                <i class="fas fa-bell text-gray-500 text-lg"></i>
            </button>
            <!-- Botón de Perfil -->
            <button>
                <i class="fas fa-user text-gray-500 text-lg"></i>
            </button>
        </div>
    </div>

    <!-- Container -->
    <div class="flex-1 flex flex-wrap">
        <!-- Sidebar Categories -->
        @yield('sidebarContent')
        <div class="flex-1 p-4 w-full md:w-1/2">
            <!-- Search Bar -->
            <div class="relative max-w-md w-full">
                <div class="absolute top-1 left-2 inline-flex items-center p-2">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input class="w-full h-10 pl-10 pr-4 py-1 text-base placeholder-gray-500 border rounded-full focus:shadow-outline" type="search" placeholder="Search Application...">
            </div>

            <!-- Graphics container -->
            @yield('graphContent')

            <!-- Departments -->
            <!-- Departments Section -->
            @yield('departmentContent')

            {{-- Applications --}}
            {{-- Applications Section --}}
            @yield('applicationsContent')
        </div>
    </div>
</div>

<!-- Graphics Script -->
<script>
    var env = {!! App\Models\Application::environment_count() !!};


    console.log(env);

        countData = [];
        envNames = [];

        env.forEach(element => {
            countData.push(element.count)
            envNames.push(element.details)
        });

        colors = ['#00F0FF', '#8B8B8D', '#00FF00']
    var usersChart = new Chart(document.getElementById('usersChart'),{
        type: 'doughnut',
        data: {
            labels: envNames,
            datasets: [{
                data: countData, 
                backgroundColor: ['#00F0FF', '#8B8B8D', '#00FF00'],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: 'bottom' 
            }
        }
    });

    // Responsive menu
    const menuBtn = document.getElementById('menuBtn');
    const sideNav = document.getElementById('sideNav');

    menuBtn.addEventListener('click', () => {
        sideNav.classList.toggle('hidden'); 
    });
</script>
</body>
</html>