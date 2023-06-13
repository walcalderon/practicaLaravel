<html>
<head>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white  leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ $action }}" method="POST">
                        @csrf
                        @isset ($method)
                            @method($method)
                        @endif
                        <div class="mb-4">
                            <label for="NombreProyecto" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Nombre') }}</label>
                            <input type="text" name="NombreProyecto" id="NombreProyecto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('NombreProyecto', $project->NombreProyecto) }}">
                            @error('NombreProyecto')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="fuenteFondos" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Fuente Fondos') }}</label>
                            <input type="text" name="fuenteFondos" id="fuenteFondos" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('fuenteFondos', $project->fuenteFondos) }}">
                           
                            @error('fuenteFondos')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="MontoPlanificado" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Monto Planificado') }}</label>
                            <input type="number" min=0  name="MontoPlanificado" id="MontoPlanificado" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{old('MontoPlanificado', number_format($project->MontoPlanificado,2)) }}">
                           
                            @error('MontoPlanificado')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="MontoPatrocinado" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Monto Patrocinado') }}</label>
                            <input type="number" name="MontoPatrocinado" id="MontoPatrocinado" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('MontoPatrocinado', number_format($project->MontoPatrocinado,2)) }}">
                           
                            @error('MontoPatrocinado')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="MontoFondosPropios" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Monto Fondos Propios') }}</label>
                            <input type="number" name="MontoFondosPropios" id="MontoFondosPropios" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('MontoFondosPropios', number_format($project->MontoFondosPropios,2)) }}">
                           
                            @error('MontoFondosPropios')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex justify-end">
                            <a href="{{ route('projects.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">{{ __('Cancelar') }}</a>
                            <button type="submit" style="background-color:indigo" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded ml-2">{{ $buttonText }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
</body>  
</html>