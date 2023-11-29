<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <span>Hello {{ auth()->user()->name }}. Manage your profile in <a class="underline"
                                                                                      href="{{ route('profile.edit') }}">profile</a> section</span>
                </div>
            </div>

            @can('is-admin')
                <div class="grid grid-cols-2 gap-3 mt-3">
                    <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        {!! $genderChart->container() !!}

                        {!! $genderChart->script() !!}
                    </div>

                    <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        {!! $departmentChart->container() !!}

                        {!! $departmentChart->script() !!}
                    </div>

                    <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        {!! $positionChart->container() !!}

                        {!! $positionChart->script() !!}
                    </div>

                    <div>


                        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                            <a href="#">
                                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $userCount }} : {{ $adminCount }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Users : Admins</p>

                        </div>

                    </div>

                </div>
            @endcan

        </div>
    </div>
</x-app-layout>
