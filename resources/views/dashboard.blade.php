<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <span>Hello {{ auth()->user()->name }}. Manage your profile in <a class="underline"
                                                                                      href="{{ route('profile.edit') }}">profile</a> section</span>
                </div>
            </div>

            @can('is-admin')
                <div class="grid grid-cols-2 gap-3 mt-3">
                    <div>
                        {!! $genderChart->container() !!}

                        {!! $genderChart->script() !!}
                    </div>

                    <div>
                        {!! $departmentChart->container() !!}

                        {!! $departmentChart->script() !!}
                    </div>

                    <div>
                        {!! $positionChart->container() !!}

                        {!! $positionChart->script() !!}
                    </div>

                </div>
            @endcan

        </div>
    </div>
</x-app-layout>
