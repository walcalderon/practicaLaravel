<!-- Navigation Links -->
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-nav-link>

    <!-- añadimos la navegación a proyectos -->
    <x-nav-link :href="route('projects.index')" :active="request()->routeIs('projects.index')">
        {{ __('Proyectos') }}
    </x-nav-link>
  
    <!-- añadimos la navegación a Reporte -->
    <x-nav-link :href="route('PDF_Example')" :active="request()->routeIs('PDF_Example')">
        {{ __('Reporte') }}
    </x-nav-link>
</div>