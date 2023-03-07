<x-app-layout>
    <div class="w-full px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
            <div class="flex-auto p-4">
                {{ __('Hello '. auth()->user()->name) }}

                <div class="flex">
                    <div class="w-1/2">
                        <x-basic-card :main-text="$studentCount" :sub-text="'Total students registered in the system'"/>
                    </div>
                    <div class="w-1/2">
                        <x-basic-card :main-text="$subjectCount" :sub-text="'Total subjects'"/>
                    </div>

                </div>


            </div>
        </div>

    </div>

</x-app-layout>
