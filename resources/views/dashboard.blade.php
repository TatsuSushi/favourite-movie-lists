<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Favourite Movies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div id="dashboard"></div>
                    <script>
                        var status = `{{ session('status') }}`;
                        var movies = @json($movies);
                        var csrf="{{@csrf_token()}}";
                    </script>
                    <script src="../js/Dashboard.js"></script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
