<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($employee->name) }}
        </h2>
    </x-slot>

    <div class="max-w-sm mx-auto mt-5 bg-gray-700 p-3 rounded">

        <form method="POST" action="{{ route('employees.store') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')"/>
                <span class="text-lg text-gray-400">{{ $employee->name }}</span>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')"/>
                <span class="text-lg text-gray-400">{{ $employee->email }}</span>

            </div>

            <!-- Mobile number -->
            <div class="mt-4">
                <x-input-label for="mobile" :value="__('Mobile')"/>
                <span class="text-lg text-gray-400">{{ $employee->mobile_number }}</span>

            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-input-label for="address" :value="__('Address')"/>
                <span class="text-lg text-gray-400">{{ $employee->address }}</span>

            </div>

            <!-- Gender -->
            <div class="mt-4">
                <x-input-label for="gender" :value="__('Gender')"/>
                <span class="text-lg text-gray-400">{{ $employee->gender }}</span>

            </div>

            <!-- Departments -->
            <div class="mt-4">
                <x-input-label for="department" :value="__('Department')"/>
                <span class="text-lg text-gray-400">{{ $employee->department->name }}</span>

            </div>


            <!-- Positions -->
            <div class="mt-4">
                <x-input-label for="position" :value="__('Position')"/>
                <span class="text-lg text-gray-400">{{ $employee->position->name }}</span>

            </div>

            <!-- Admin Status -->
            <div class="mt-4">
                <x-input-label for="position" :value="__('Type')"/>
                @if($employee->is_admin)
                    <span class="text-lg text-gray-400">Admin</span>
                @else
                    <span class="text-lg text-gray-400">Employee</span>
                @endif
            </div>

        </form>
    </div>
</x-app-layout>

