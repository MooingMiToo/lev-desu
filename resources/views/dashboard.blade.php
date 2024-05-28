<x-app-layout>
    <div class="header-container" style="margin-bottom: 20px;">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('お薬管理') }}
            </h2>
        </x-slot>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-3xl font-bold mb-4">{{ __("You're logged in!") }}</h3>
                    <p class="text-lg">Welcome to your dashboard. Here you can manage your account settings, view your recent activity, and much more.</p>
                    <button class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Go to Dashboard') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <style>
        .header-container {
            background-color: #3498db; /* Add your desired color */
            padding: 20px; /* Optional: Add padding for better appearance */
            margin-bottom: 20px; /* Optional: Adjust margin for spacing */
        }
        .header-container h2 {
            color: #fff; /* Set text color to white for contrast */
            margin: 0; /* Reset margin for h2 within the header */
        }
    </style>
</x-app-layout>