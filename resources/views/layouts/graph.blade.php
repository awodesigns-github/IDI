@section('graphContent')
    <div class="mt-8 flex flex-row space-x-2 space-y-0 md:space-x-4 md:space-y-0">
        <!-- Application graphs -->
        <!-- Environment section -->
        <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
            <h2 class="text-gray-500 text-lg font-semibold pb-1">Applications Environments</h2>
            <div class="my-1"></div>
            <div class="bg-gradient-to-r from-cyan-500 to-cyan-300 h-px mb-6"></div> 
            <div class="chart-container" style="position: relative; height:150px; width:100%">
                <!-- Graphics canvas -->
                <canvas id="usersChart"></canvas>
            </div>
        </div>
        <div class="flex-1 bg-white p-4 shadow rounded-lg md:w-1/2">
            <h2 class="text-gray-500 text-lg font-semibold pb-1">Memory Usage</h2>
            <div class="my-1"></div>
            <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div> 
            <div class="chart-container" style="position: relative; height:150px; width:100%">
                <!-- Graphics canvas -->
                <canvas id="usageChart"></canvas>
            </div>
        </div>
    </div>
@endsection