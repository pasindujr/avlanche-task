<x-app-layout>
    <div class="w-full px-4">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
            <div class="rounded-t mb-0 px-4 py-3 border-0">
                <div class="flex flex-wrap items-center">
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                        <h3 class="font-semibold text-lg text-slate-700">
                            {{ __('Edit Student') }}
                        </h3>
                    </div>
                </div>
            </div>
            <div class=" px-6 py-4 border-0 rounded relative mb-4">
                @livewire('student.edit-form', ['user' => $user])
            </div>

        </div>


    </div>
</x-app-layout>
