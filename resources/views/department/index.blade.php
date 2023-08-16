@extends('layouts.dashboard')
@extends('layouts.sidebar')
@section('departmentContent')
<!-- Departments -->
<!-- Departments Section -->
    <div class="mt-8 bg-white p-4 shadow rounded-lg">
        <h2 class="text-gray-500 text-lg font-semibold pb-4">Departments</h2>
        <div class="my-1"></div> {{-- separation --}}
        <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
        <table class="w-full table-auto text-sm">
            <thead>
                <tr class="text-sm leading-normal">
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Name</th>
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Units</th>
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Branch</th>
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Applications</th>
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">HOD</th>
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-grey-lighter">
                    @if (!$department)
                        <td class="py-2 px-4 border-b border-grey-light">No data available</td>
                    @endif
                </tr>
                <tr class="hover:bg-grey-lighter">
                    <td class="py-2 px-4 border-b border-grey-light">Juan Pérez</td>
                    <td class="py-2 px-4 border-b border-grey-light">Comercio</td>
                </tr>
                <!-- Añade más filas aquí como la anterior para cada autorización pendiente -->
                <tr class="hover:bg-grey-lighter">
                    <td class="py-2 px-4 border-b border-grey-light">María Gómez</td>
                    <td class="py-2 px-4 border-b border-grey-light">Usuario</td>
                </tr>
                </tr>
                <tr class="hover:bg-grey-lighter">
                    <td class="py-2 px-4 border-b border-grey-light">Carlos López</td>
                    <td class="py-2 px-4 border-b border-grey-light">Usuario</td>
                </tr>
                <tr class="hover:bg-grey-lighter">
                    <td class="py-2 px-4 border-b border-grey-light">Laura Torres</td>
                    <td class="py-2 px-4 border-b border-grey-light">Comercio</td>
                </tr>
                <tr class="hover:bg-grey-lighter">
                    <td class="py-2 px-4 border-b border-grey-light">Ana Ramírez</td>
                    <td class="py-2 px-4 border-b border-grey-light">Usuario</td>
                </tr>
            </tbody>
        </table>
        <!-- Botón "Ver más" para la tabla de Autorizaciones Pendientes -->
        <div class="text-right mt-4">
            <button class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded">
                Add a Department
            </button>
        </div>
    </div>
@endsection