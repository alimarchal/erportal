<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight inline-block">
            Dispatch Record
        </h2>

        <div class="flex justify-center items-center float-right">
            <button id="toggle"
                    class="inline-flex items-center ml-2 px-4 py-2 bg-blue-950 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-950 focus:bg-green-800 active:bg-green-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                Search
            </button>

            <a href="{{ route('dispatch-registers.create') }}"
               class="inline-flex items-center ml-2 px-4 py-2 bg-blue-950 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-950 focus:bg-green-800 active:bg-green-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span class="hidden md:inline-block">Add Dispatch</span>
            </a>

            <a href="javascript:window.location.reload();"
               class="inline-flex items-center ml-2 px-4 py-2 bg-blue-950 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-950 focus:bg-green-800 active:bg-green-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                </svg>
            </a>

            <a href="{{ route('product.index') }}"
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

    <!-- FILTER SECTION -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg" id="filters"
             style="display: none">
            <div class="p-6">
                <form method="GET" action="{{ route('dispatch-registers.index') }}">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div>
                            <x-label for="year" value="Year" />
                            <x-input type="number" name="filter[year]" id="year"
                                     value="{{ request('filter.year') }}" class="block mt-1 w-full"
                                     placeholder="e.g. 2025" />
                        </div>

                        <div>
                            <x-label for="date_from" value="Date From" />
                            <x-input type="date" name="filter[date_from]" id="date_from"
                                     value="{{ request('filter.date_from') }}" class="block mt-1 w-full" />
                        </div>

                        <div>
                            <x-label for="date_to" value="Date To" />
                            <x-input type="date" name="filter[date_to]" id="date_to"
                                     value="{{ request('filter.date_to') }}" class="block mt-1 w-full" />
                        </div>

                        <div>
                            <x-label for="division_id" value="Division" />
                            <select name="filter[division_id]" id="division_id"
                                    class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">-- Select --</option>
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}"
                                        {{ request('filter.division_id') == $division->id ? 'selected' : '' }}>
                                        {{ $division->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-label for="dispatch_no" value="Dispatch Number" />
                            <x-input type="text" name="filter[dispatch_no]" id="dispatch_no"
                                     value="{{ request('filter.dispatch_no') }}" class="block mt-1 w-full"
                                     placeholder="Enter dispatch number" />
                        </div>

                        <div>
                            <x-label for="particulars" value="Particulars" />
                            <x-input type="text" name="filter[particulars]" id="particulars"
                                     value="{{ request('filter.particulars') }}" class="block mt-1 w-full"
                                     placeholder="Search in particulars" />
                        </div>

                        <div>
                            <x-label for="receipt_no" value="Receipt Number" />
                            <x-input type="text" name="filter[receipt_no]" id="receipt_no"
                                     value="{{ request('filter.receipt_no') }}" class="block mt-1 w-full"
                                     placeholder="Search by receipt number" />
                        </div>

                        <div>
                            <x-label for="reference_number" value="Reference Number" />
                            <x-input type="text" name="filter[reference_number]" id="reference_number"
                                     value="{{ request('filter.reference_number') }}" class="block mt-1 w-full"
                                     placeholder="Search by reference number" />
                        </div>
                    </div>

                    <div class="mt-4 flex space-x-3">
                        <x-button class="bg-blue-950 text-white hover:bg-green-800">
                            Apply Filters
                        </x-button>

                        <a href="{{ route('dispatch-registers.index') }}"
                           class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-gray-800 dark:text-gray-300 uppercase tracking-widest hover:bg-gray-400 dark:hover:bg-gray-600 focus:bg-gray-400 dark:focus:bg-gray-600 active:bg-gray-400 dark:active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Clear Filters
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- TABLE SECTION -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-2 pb-16">
        <x-status-message />
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
            @if ($dispatches->count() > 0)
                <div class="relative overflow-x-auto rounded-lg">
                    <table class="min-w-max w-full table-auto text-sm">
                        <thead>
                        <tr class="bg-green-800 text-white uppercase text-sm">
                            <th class="py-2 px-2 text-center">#</th>
                            <th class="py-2 px-2 text-center">Ref No</th>
                            <th class="py-2 px-2 text-center">Date</th>
                            <th class="py-2 px-2 text-center">Dispatch No</th>
                            <th class="py-2 px-2 text-center">Particulars</th>
                            <th class="py-2 px-2 text-center">Division</th>
                            <th class="py-2 px-2 text-center">Address</th>
                            <th class="py-2 px-2 text-center">Attachments</th>
                            <th class="py-2 px-2 text-center print:hidden">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="text-black text-md leading-normal font-extrabold">
                        @foreach ($dispatches as $index => $dispatch)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-1 px-2 text-center">{{ $index + 1 }}</td>
                                <td class="py-1 px-2 text-center">{{ $dispatch->reference_number }}</td>
                                <td class="py-1 px-2 text-center">
                                    {{ $dispatch->date ? \Carbon\Carbon::parse($dispatch->date)->format('d-m-Y') : '-' }}
                                </td>
                                <td class="py-1 px-2 text-center">{{ $dispatch->dispatch_no ?? '-' }}</td>
                                <td class="py-1 px-2 text-center">{{ $dispatch->particulars ?? '-' }}</td>
                                <td class="py-1 px-2 text-center">{{ $dispatch->division->name ?? '-' }}</td>
                                <td class="py-1 px-2 text-center">{{ $dispatch->address ?? '-' }}</td>
                                <td class="py-1 px-2 text-center">
                                    @if ($dispatch->attachment && Storage::disk('public')->exists($dispatch->attachment))
                                        <a href="{{ asset('storage/' . $dispatch->attachment) }}"
                                           class="text-blue-600 hover:underline" target="_blank" download>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                 class="w-5 h-5 inline-block">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13" />
                                            </svg>
                                        </a>
                                    @else
                                        -
                                    @endif

                                </td>


                                <td class="py-1 px-2 text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('dispatch-registers.edit', $dispatch->id) }}"
                                           class="inline-flex items-center px-3 py-1 bg-blue-800 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                            Edit
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="px-2 py-2">
                    {{ $dispatches->links() }}
                </div>
            @else
                <p class="text-gray-700 dark:text-gray-300 text-center py-4">
                    No dispatch records found.
                    <a href="{{ route('dispatch-registers.create') }}" class="text-blue-600 hover:underline">
                        Add a new dispatch entry
                    </a>.
                </p>
            @endif
        </div>
    </div>

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
            style.textContent = `#filters {transition: opacity 0.3s ease, transform 0.3s ease;}`;
            document.head.appendChild(style);
        </script>
    @endpush
</x-app-layout>
