<!-- component -->
<!DOCTYPE html>
<html lang="es">
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    @livewireStyles
</head>
<body>
    <style>
        /* CHECKBOX TOGGLE SWITCH */
        /* @apply rules for documentation, these do not work as inline style */
        .toggle-checkbox:checked {
          @apply: right-0 border-green-400;
          right: 0;
          border-color: #68D391;
        }
        .toggle-checkbox:checked + .toggle-label {
          @apply: bg-green-400;
          background-color: #68D391;
        }
        </style>
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
                <input class="w-full h-10 pl-10 pr-4 py-1 text-base placeholder-gray-500 border rounded-full focus:shadow-outline" type="search" placeholder="Search Server...">
            </div>

            <!-- Graphics container -->
            @yield('graphContent')

            <!-- Departments -->
            <!-- Departments Section -->
            @yield('departmentContent')

            @yield('applicationsDetailsContent')

            {{-- Applications --}}
            {{-- Applications Section --}}
            @yield('applicationsContent')

            {{-- Servers and environments --}}
            @yield('serverContent')

            @yield('serverDetailsContent')
        </div>
    </div>
</div>

<!-- Graphics Script -->
<script>
    // jquery page reload
    $(document).ready(function () {
       setInterval(() => {
        location.reload()
       }, 10000); 
    });

    // status graph
    var status = {!! App\Models\Application::application_status() !!} // running applications
    console.log(status);

    // environment count script
    var env = {!! App\Models\Application::environment_count() !!}

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
                backgroundColor: colors,
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

    // Server status --- running and down servers


    //Memory usage script
    var appName = {!! App\Models\Application::application_name() !!};

    application_names = []

    appName.forEach(element => {
        application_names.push(element.name)
    });
    

    var usageChart = new Chart(document.getElementById('usageChart'),{
        type: 'line',
        data: {
            labels: application_names,
            datasets: [{
                barThickness: 10,
                data: [1200, 13000, 4950, 5600, 2000, 6000, 300], 
                backgroundColor: ['#00F0FF', '#8B8B8D', '#00FF00'],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });   

    // applications count
    var apps = {!! App\Models\Server::application_count() !!} // application count in servers
    // console.log(apps)
    countApps = []
    names = []

    console.log(countApps, names)

    apps.forEach(element => {
        countApps.push(element.count)
        names.push(element.hostname)
    });
    
    var serverStatus =  new Chart(document.getElementById('serverStatus'),{
        type: 'bar',
        data: {
            labels: names,
            datasets: [{
                barThickness: 5,
                data: countApps,
                backgroundColor: ['#00F0FF', '#8B8B8D', '#00FF00'],

            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    // server performance based on latency...
    // dynamic server status -- pinging random sites for tests

    // Responsive menu
    const menuBtn = document.getElementById('menuBtn');
    const sideNav = document.getElementById('sideNav');

    menuBtn.addEventListener('click', () => {
        sideNav.classList.toggle('hidden'); 
    });
</script>
@livewireScripts
</body>
</html>