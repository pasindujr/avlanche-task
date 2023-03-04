<x-app-layout>
    <div class="w-full px-4">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
            <div class="rounded-t mb-0 px-4 py-3 border-0">
                <div class="flex flex-wrap items-center">
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                        <h3 class="font-semibold text-lg text-slate-700">
                            {{ __('Users') }}
                        </h3>
                        @if(Session::has('student-deleted'))
                            <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-orange-500"><span
                                    class="text-xl inline-block mr-5 align-middle">
                                <i class="fas fa-bell"></i></span>
                                <span
                                    class="inline-block align-middle mr-8">{{ Session::get('student-deleted') }}</span>
                                <button
                                    class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
                                    <span>×</span>
                                </button>
                            </div>
                        @endif
                    </div>
                    <a href="{{ route('students.create') }}">
                        <button
                            class="bg-indigo-500 text-white active:bg-indigo-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                            type="button">
                            Create
                        </button>
                    </a>

                </div>
                @livewire('student.student-table')
            </div>


        </div>


    </div>
</x-app-layout>
