<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="max-w-sm mx-auto mt-5 bg-gray-700 p-3 rounded">

        <form method="POST" action="{{ route('employees.store') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')"/>
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                              required autofocus autocomplete="name"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                              :value="old('email')" required autocomplete="username"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>

            <!-- Mobile number -->
            <div class="mt-4">
                <x-input-label for="mobile" :value="__('Mobile')"/>
                <x-text-input id="mobile" class="block mt-1 w-full" type="number" name="mobile"
                              :value="old('mobile')" required autofocus autocomplete="mobile"/>
                <x-input-error :messages="$errors->get('mobile')" class="mt-2"/>
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-input-label for="address" :value="__('Address')"/>
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address"
                              :value="old('address')" required autofocus autocomplete="address"/>
                <x-input-error :messages="$errors->get('address')" class="mt-2"/>
            </div>

            <!-- Gender -->
            <div class="mt-4">
                <x-input-label for="gender" :value="__('Gender')"/>
                <select required
                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                        name="gender" id="gender">
                    <option value="">Select a gender</option>
                        <option @if(old('gender') == 'male') selected @endif value="male">Male</option>
                        <option @if(old('gender') == 'female') selected @endif value="female">Female</option>
                        <option @if(old('gender') == 'other') selected @endif value="other">Other</option>
                </select>
                <x-input-error :messages="$errors->get('gender')" class="mt-2"/>
            </div>

            <!-- Departments -->
            <div class="mt-4">
                <x-input-label for="department" :value="__('Department')"/>
                <select required
                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                        name="department" id="department">
                    <option value="">Select a department</option>
                    @foreach($departments as $department)
                        <option @if(old('department') == $department->id) selected @endif value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('department')" class="mt-2"/>
            </div>


            <!-- Positions -->
            <div class="mt-4">
                <x-input-label for="position" :value="__('Position')"/>
                <select required
                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                        name="position" id="position">
                    <option value="">Select a position</option>
                    @foreach($positions as $position)
                        <option @if(old('position') == $position->id) selected @endif value="{{ $position->id }}">{{ $position->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('position')" class="mt-2"/>
            </div>

            <!-- Admin Status -->
            <div class="mt-4">
                <x-input-label for="admin" :value="__('Admin Status')"/>
                <select required class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full"
                        name="admin" id="admin">
                    <option value="">Select a status</option>

                        <option @if(old('admin') == 1) selected @endif value="1">Yes</option>
                        <option @if(old('admin') == 0) selected @endif value="0">No</option>
                </select>
                <x-input-error :messages="$errors->get('admin')" class="mt-2"/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')"/>

                <x-text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required autocomplete="new-password"/>

                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                              type="password"
                              name="password_confirmation" required autocomplete="new-password"/>

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-primary-button class="ms-4">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>

