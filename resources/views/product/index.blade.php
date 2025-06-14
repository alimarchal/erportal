<x-app-layout>
    @push('header')
        <link rel="stylesheet" href="{{ url('jsandcss/daterangepicker.min.css') }}">
        <script src="{{ url('jsandcss/moment.min.js') }}"></script>
        <script src="{{ url('jsandcss/knockout-3.5.1.js') }}" defer></script>
        <script src="{{ url('jsandcss/daterangepicker.min.js') }}" defer></script>
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight inline-block">
            Product
        </h2>

        <div class="flex justify-center items-center float-right">
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
            <div class="grid grid-cols-12 mb-4 gap-6">


                <a href="{{ route('circulars.index') }}"
                    class="transform hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-4 intro-y bg-white block">
                    <div class="p-5 flex justify-between">
                        <div>
                            <div class="text-3xl font-bold leading-8">{{ \App\Models\Circular::count() }}</div>
                            <div class="mt-1 text-base font-extrabold text-black">Circulars</div>

                        </div>
                        <img src="{{ url('icons-images/circular.png') }}" alt="Account" class="h-16 w-16">
                    </div>
                </a>


                <a href="{{ route('complaints.index') }}"
                    class="transform hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-4 intro-y bg-white block">
                    <div class="p-5 flex justify-between">
                        <div>
                            <div class="text-3xl font-bold leading-8">{{ \App\Models\Complaint::count() }}</div>
                            <div class="mt-1 text-base font-extrabold text-black">Complaints</div>
                        </div>
                        <img src="{{ url('icons-images/complaint.png') }}" alt="Account" class="h-16 w-16">
                    </div>
                </a>


                <a href="{{ route('docs.index') }}"
                    class="transform hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-4 intro-y bg-white block">
                    <div class="p-5 flex justify-between">
                        <div>
                            <div class="text-3xl font-bold leading-8">{{ \App\Models\Doc::count() }}</div>
                            <div class="mt-1 text-base font-extrabold text-black">HRMD & Manuals</div>
                        </div>
                        <img src="{{ url('icons-images/hr1.png') }}" alt="Account" class="h-16 w-16">
                    </div>
                </a>



                <a href="{{ route('printed-stationeries.index') }}"
                    class="transform hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-4 intro-y bg-white block">
                    <div class="p-5 flex justify-between">
                        <div>
                            <div class="text-3xl font-bold leading-8">{{ \App\Models\PrintedStationery::count() }}
                            </div>
                            <div class="mt-1 text-base font-extrabold text-black">Printed Stationeries</div>

                        </div>
                        <img src="{{ url('icons-images/stationary.png') }}" alt="Account" class="h-16 w-16">
                    </div>
                </a>


                <a href="{{ route('stationery-transactions.index') }}"
                    class="transform hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-4 intro-y bg-white block">
                    <div class="p-5 flex justify-between">
                        <div>
                            <div class="text-3xl font-bold leading-8">
                                &nbsp;{{ \App\Models\StationeryTransaction::count() }}</div>
                            <div class="mt-1 text-base font-extrabold text-black">Stationery Transactions</div>

                        </div>
                        <img src="{{ url('icons-images/stat-report.png') }}" alt="Account" class="h-16 w-16">
                    </div>
                </a>
                <a href="{{ route('dispatch-registers.index') }}"
                    class="transform hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-4 intro-y bg-white block">
                    <div class="p-5 flex justify-between">
                        <div>
                            <div class="text-3xl font-bold leading-8">
                                &nbsp;{{ \App\Models\DispatchRegister::count() }}</div>
                            <div class="mt-1 text-base font-extrabold text-black">Dispatch Record</div>
                        </div>
                        <img src="{{ url('icons-images/dispatch.png') }}" alt="Account" class="h-16 w-16">
                    </div>
                </a>
                <a href="{{ route('daily-positions.index') }}"
                    class="transform hover:scale-110 transition duration-300 shadow-xl rounded-lg col-span-4 intro-y bg-white block">
                    <div class="p-5 flex justify-between">
                        <div>
                            <div class="text-3xl font-bold leading-8">Branch</div>
                            <div class="mt-1 text-base font-extrabold text-black">Daily Position</div>
                        </div>
                        <img src="{{ url('icons-images/report.png') }}" alt="Account" class="h-16 w-16">
                    </div>
                </a>




            </div>
        </div>
    </div>
    <div id="filters">
        <!-- Content for filters -->
    </div>

    <button id="toggle"></button>

    @push('modals')
        <script>
            const targetDiv = document.getElementById("filters");
            const btn = document.getElementById("toggle");

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

            document.addEventListener('click', function(event) {
                if (targetDiv.style.display === 'block' && !targetDiv.contains(event.target) && event.target !== btn) {
                    hideFilters();
                }
            });

            targetDiv.addEventListener('click', function(event) {
                event.stopPropagation();
            });

            const style = document.createElement('style');
            style.textContent = `
            #filters {
                transition: opacity 0.3s ease, transform 0.3s ease;
            }
        `;
            document.head.appendChild(style);
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.querySelectorAll('.delete-button').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();

                    const form = this.closest('form');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>
