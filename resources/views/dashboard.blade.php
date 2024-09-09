<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        
        <!-- if logged in, then redirect to todos.index. else redirect to login -->
        @auth
            <script>
                window.location.href = "/todos";
            </script>
            <meta http-equiv="refresh" content="0;url=/todos">
        @endauth

        <!-- if not logged in, then redirect to login -->
        @guest
            <script>
                window.location.href = "/login";
            </script>
            <meta http-equiv="refresh" content="0;url=/login">
        @endguest

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
