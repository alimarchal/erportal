
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-12 mb-4 gap-6">

            <a href="{{route('daily-positions.index')}}" class="transform hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white block">
                    <div class="p-5 flex justify-between">
                        <div>
                            <div class="text-3xl font-bold leading-8">Daily</div>
                            <div class="mt-1 text-base font-extrabold text-black">Branch Position</div>
                        </div>
                        <img src="{{url('icons-images/daily.png') }}" alt="Roles" class="h-16 w-16">
                    </div>

                </a>
             
        </div>
    </div>
</x-app-layout>