<x-app-layout>

    @push('header')
        <link rel="stylesheet" href="{{ url('jsandcss/daterangepicker.min.css') }}">
        <script src="{{ url('jsandcss/moment.min.js') }}"></script>
        <script src="{{ url('jsandcss/knockout-3.5.1.js') }}" defer></script>
        <script src="{{ url('jsandcss/daterangepicker.min.js') }}" defer></script>
    @endpush


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight inline-block">
            Settings
        </h2>

        <div class="flex justify-center items-center float-right">
            {{--  <button id="toggle" class="inline-flex items-center ml-2 px-4 py-2 bg-blue-950 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bbg-green-950 focus:bg-green-800 active:bg-green-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                Search
            </button>
            <a href="{{ route('settings.branchsetting') }}" class="inline-flex items-center ml-2 px-4 py-2 bg-blue-950 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-950 focus:bg-green-800 active:bg-green-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span class="hidden md:inline-block">Add Target</span>
            </a>  --}}
            <a href="{{ route('dashboard') }}"
                class="inline-flex items-center ml-2 px-4 py-2 bg-blue-950 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-800 focus:bg-green-800 active:bg-green-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <!-- Arrow Left Icon SVG -->
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
        </div>

    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg" id="filters"
            style="display: none">
            <div class="p-6">
                <form method="GET" action="{{ route('branch-targets.index') }}">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div>
                            <x-label for="branch_id" value="{{ __('Branch') }}" />
                            <select name="filter[branch_id]" id="branch_id"
                                class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                <option value="">Select a branch</option>
                                @foreach (\App\Models\Branch::all() as $branch)
                                    <option value="{{ $branch->id }}"
                                        {{ request('filter.branch_id') == $branch->id ? 'selected' : '' }}>
                                        {{ $branch->code . ' - ' . $branch->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <x-label for="fiscal_year" value="{{ __('Fiscal Year') }}" />
                            <select name="filter[fiscal_year]" id="fiscal_year"
                                class="select2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full">
                                <option value="">Select a branch</option>
                                @for ($i = 2025; $i <= 2099; $i++)
                                    <option value="{{ $i }}"
                                        {{ request('filter.fiscal_year') == $i ? 'selected' : '' }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div></div>
                    </div>

                    <div class="mt-4">
                        <x-button class="mc-bg-blue text-white hover:bg-green-800">
                            {{ __('Apply Filters') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-6">
                <!-- User Module Card -->
                <a href="settings/user-module"
                    class="transform hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-4 intro-y bg-white block">
                    <div class="p-5 flex justify-between">
                        <div>
                            <div class="text-3xl font-bold leading-8">User</div>
                            <div class="mt-1 text-base font-extrabold text-black">Module</div>
                        </div>
                        <img src="{{ url('icons-images/user1.png') }}" alt="Users" class="h-16 w-16">
                    </div>
                </a>

                <!-- Branch Module Card -->
                <a href="{{ route('settings.branchsetting') }}"
                    class="transform hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-4 intro-y bg-white block">
                    <div class="p-5 flex justify-between">
                        <div>
                            <div class="text-3xl font-bold leading-8">Branch</div>
                            <div class="mt-1 text-base font-extrabold text-black">Module</div>
                        </div>
                        <img src="{{ url('icons-images/bankmodule.png') }}" alt="Branches" class="h-16 w-16">
                    </div>
                </a>
                <a href="{{ url('settings/user-module/managers') }}"
                    class="transform hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-4 intro-y bg-white block">

                    <div class="p-5 flex justify-between">
                        <div>
                            <div class="text-3xl font-bold leading-8">{{ \App\Models\Manager::count() }}</div>
                            <div class="mt-1 text-base font-extrabold text-black">Managers</div>
                        </div>
                        <img src="{{ url('icons-images/user.png') }}" alt="Users" class="h-16 w-16">
                    </div>
                </a>
                <a
                    href="{{ route('branch-targets.index') }}"class="transform hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-4 intro-y bg-white block">
                    <div class="p-5 flex justify-between">
                        <div>
                            <div class="text-3xl font-bold leading-8">{{ \App\Models\BranchTarget::count() }}</div>
                            <div class="mt-1 text-base font-extrabold text-black">Target</div>
                        </div>
                        <img src="{{ url('icons-images/branchtarget.png') }}" alt="Branches" class="h-16 w-16">
                    </div>
                </a>
                <a
                    href="{{ route('categories.index') }}"class="transform hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-4 intro-y bg-white block">
                    <div class="p-5 flex justify-between">
                        <div>
                            <div class="text-3xl font-bold leading-8">{{ \App\Models\Category::count() }}</div>
                            <div class="mt-1 text-base font-extrabold text-black">Category</div>
                        </div>
                        <img src="{{ url('icons-images/classification.png') }}" alt="Branches" class="h-16 w-16">
                    </div>
                </a>


            </div>
        </div>
    </div>

    {{--  <a href="settings.branchsetting" class="transform hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white block">
                        <div class="p-5 flex justify-between">
                            <div>
                                <div class="text-3xl font-bold leading-8">35</div>
                                <div class="mt-1 text-base font-extrabold text-black">Courses</div>
                            </div>
                            <img src="https://mc.imste.com/icons-images/course.png" alt="Courses" class="h-16 w-16">
                        </div>
                    </a>
                    <a href="https://mc.imste.com/certificateCategory" class="transform hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white block">
                        <div class="p-5 flex justify-between">
                            <div>
                                <div class="text-3xl font-bold leading-8">Certificate</div>
                                <div class="mt-1 text-base font-extrabold text-black">Category</div>
                            </div>
                            <img src="https://mc.imste.com/icons-images/certificate.png" alt="Certificates Category" class="h-16 w-16">
                        </div>
                    </a>
                    <a href="https://mc.imste.com/instituteClass" class="transform hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white block">
                        <div class="p-5 flex justify-between">
                            <div>
                                <div class="text-3xl font-bold leading-8">Class</div>
                                <div class="mt-1 text-base font-extrabold text-black">Rooms</div>
                            </div>
                            <img src="https://mc.imste.com/icons-images/classrooms.png" alt="Class Rooms" class="h-16 w-16">
                        </div>
                    </a>
                    <a href="https://mc.imste.com/account-category" class="transform hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white block">
                        <div class="p-5 flex justify-between">
                            <div>
                                <div class="text-3xl font-bold leading-8">Account</div>
                                <div class="mt-1 text-base font-extrabold text-black">Categories</div>
                            </div>
                            <img src="https://mc.imste.com/icons-images/accounting.png" alt="Account Category" class="h-16 w-16">
                        </div>
                    </a>
                    <a href="https://mc.imste.com/transactions" class="transform hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white block">
                        <div class="p-5 flex justify-between">
                            <div>
                                <div class="text-3xl font-bold leading-8">MC</div>
                                <div class="mt-1 text-base font-extrabold text-black">Transactions</div>
                            </div>
                            <img src="https://mc.imste.com/icons-images/transaction.png" alt="Transactions" class="h-16 w-16">
                        </div>
                    </a>
                    <a href="https://mc.imste.com/bank-deposit" class="transform hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white block">
                        <div class="p-5 flex justify-between">
                            <div>
                                <div class="text-3xl font-bold leading-8">Bank</div>
                                <div class="mt-1 text-base font-extrabold text-black">Deposits</div>
                            </div>
                            <img src="https://mc.imste.com/icons-images/bank-deposit.png" alt="Account" class="h-16 w-16">
                        </div>
                    </a>  --}}
    </div>
    </div>
    </div>
    <div id="filters">
        <!-- Content for filters -->
    </div>

    <button id="toggle"></button>


    @push('modals')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const targetDiv = document.getElementById("filters");
                const btn = document.getElementById("toggle");

                if (!targetDiv || !btn) {
                    console.error("Elements not found in the DOM.");
                    return;
                }

                function showFilters() {
                    targetDiv.style.display = 'block';
                    targetDiv.style.opacity = '0';
                    targetDiv.style.transform = 'translateY(-20px)';
                    setTimeout(() => {
                        targetDiv.style.opacity = '1';
                        targetDiv.style.transform = 'translateY(0)';
                    }, 10);
                }

                function hideFilters() {
                    targetDiv.style.opacity = '0';
                    targetDiv.style.transform = 'translateY(-20px)';
                    setTimeout(() => {
                        targetDiv.style.display = 'none';
                    }, 300);
                }

                btn.onclick = function(event) {
                    event.stopPropagation();
                    if (targetDiv.style.display === "none") {
                        showFilters();
                    } else {
                        hideFilters();
                    }
                };

                // Hide filters when clicking outside
                document.addEventListener('click', function(event) {
                    if (targetDiv.style.display === 'block' && !targetDiv.contains(event.target) && event
                        .target !== btn) {
                        hideFilters();
                    }
                });

                // Prevent clicks inside the filter from closing it
                targetDiv.addEventListener('click', function(event) {
                    event.stopPropagation();
                });

                // Add CSS for smooth transitions
                const style = document.createElement('style');
                style.textContent = `
            #filters {
                transition: opacity 0.3s ease, transform 0.3s ease;
            }
        `;
                document.head.appendChild(style);
            });
        </script>
    @endpush
</x-app-layout>
