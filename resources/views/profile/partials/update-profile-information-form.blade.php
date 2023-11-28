<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')"/>
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                          required autofocus autocomplete="name"/>
            <x-input-error class="mt-2" :messages="$errors->get('name')"/>
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                          :value="old('email', $user->email)" required autocomplete="username"/>
            <x-input-error class="mt-2" :messages="$errors->get('email')"/>
        </div>

        <div>
            <x-input-label for="mobile" :value="__('Mobile')"/>
            <x-text-input id="mobile" name="mobile" type="number" class="mt-1 block w-full"
                          :value="old('mobile', $user->mobile_number)" required autocomplete="mobile"/>
            <x-input-error class="mt-2" :messages="$errors->get('mobile')"/>
        </div>

        <div>
            <x-input-label for="address" :value="__('Address')"/>
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full"
                          :value="old('address', $user->address)" required autocomplete="address"/>
            <x-input-error class="mt-2" :messages="$errors->get('address')"/>

        </div>

        <!-- Gender -->
        <div class="mt-4">
            <x-input-label for="gender" :value="__('Gender')" />
            <select required class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" name="gender" id="gender">

                    <option @if($user->gender == 'male') selected @endif value="male">Male</option>
                    <option @if($user->gender == 'female') selected @endif value="female">Female</option>
                    <option @if($user->gender == 'other') selected @endif value="other">Other</option>

            </select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <!-- Departments -->
        <div class="mt-4">
            <x-input-label for="department" :value="__('Department')" />
            <select required class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" name="department" id="department">
                @foreach($departments as $department)
                    <option @if($user->department->id == $department->id) selected @endif value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('department')" class="mt-2" />
        </div>

        <!-- Positions -->
        <div class="mt-4">
            <x-input-label for="position" :value="__('Position')" />
            <select required class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" name="position" id="position">
                @foreach($positions as $position)
                    <option @if($user->position->id == $position->id) selected @endif value="{{ $position->id }}">{{ $position->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('position')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
