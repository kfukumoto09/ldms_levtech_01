<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @yield('title')
        </h2>
    </x-slot>
    
    
    <!--Body-->
    
    <div class="grid grid-cols-3 gap-20">
        
        <!-- Left | search colomn -->
        <div>
            <div class="py-1">
                <h1>Search</h1>
            </div>
            <form id="search", action="/search/results" method="GET" class="row">
            @csrf
            
                <!--Search Box-->
                <div class='py-2'>
                    <label for="search_box"><h2>Key words</h2></label>
                    <input id="search_box" name='search[words]' value="{{ $input['words'] }}" class='input bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2 w-64 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'></textarea>
                    <button type="submit" class="btn">Search</button>
                </div>
                
                <!--Date-->
                <div class='py-2'>
                    <label for="from"><h2>Date</h2></label>
                    <div date-rangepicker datepicker-format="yyyy-mm-dd" class="flex items-center">
                      <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input name="search[from]" id="from" type="text" value="{{ $input['from'] }}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
                      </div>
                      <span class="mx-4 text-gray-500">to</span>
                      <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                        </div>
                        <input name="search[to]" type="text" value="{{ $input['to'] }}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
                      </div>
                    </div>
                </div>
            </form>
        </div> <!-- left -->
        
        <!-- Right | search results -->
        <div className="col-span-2">
            <div class="py-1">
                <h1>Results</h1>
            </div>
            @yield('results')
        </div> <!-- right -->
        
    </div> <!-- grid -->
    

</x-app-layout>