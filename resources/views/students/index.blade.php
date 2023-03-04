<x-app-layout>
    <div class="w-full px-4">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
            <div class="rounded-t mb-0 px-4 py-3 border-0">
                <div class="flex flex-wrap items-center">
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                        <h3 class="font-semibold text-lg text-slate-700">
                            {{ __('Users') }}
                        </h3>
                    </div>
                    <a href="{{ route('students.create') }}"><button class="bg-indigo-500 text-white active:bg-indigo-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                            Create
                        </button></a>

                </div>
                @livewire('student.student-table')
            </div>


        </div>


    </div>
</x-app-layout>
