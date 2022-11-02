{{-- @include('layouts.navigation') --}}
<x-guest-layout>

    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Username -->
            <div>
                <x-input-label for="username" :value="__('Username')" />

                <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />

                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>

            <!-- Full Name -->
            <div>
                <x-input-label for="fullName" :value="__('Full Name')" />

                <x-text-input id="fullName" class="block mt-1 w-full" type="text" name="fullName" :value="old('fullName')" required autofocus />

                <x-input-error :messages="$errors->get('fullName')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Alamat -->
            <div>
                <x-input-label for="address" :value="__('Alamat')" />

                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus />

                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>


            <!-- Tanggal Lahir -->
            <div>
                <x-input-label for="birthdate" :value="__('Tanggal Lahir')" />

                <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate')" required autofocus />

                <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
            </div>

            <!-- No Telepon -->
            <div>
                <x-input-label for="phoneNumber" :value="__('No Telepon')" />

                <x-text-input id="phoneNumber" class="block mt-1 w-full" type="number" name="phoneNumber" :value="old('phoneNumber')" required autofocus />

                <x-input-error :messages="$errors->get('phoneNumber')" class="mt-2" />
            </div>

            <!-- Agama -->
            <div>
                <x-input-label for="religion" :value="__('Agama')" />

                <x-text-input id="religion" class="block mt-1 w-full" type="text" name="religion" :value="old('religion')" required autofocus />

                <x-input-error :messages="$errors->get('religion')" class="mt-2" />
            </div>

            <!-- Jenis Kelamin -->
            <div>
                <x-input-label for="gender" :value="__('Jenis Kelamin')" />

                <input name="gender" id="male" value=1 type="radio" checked />
                <label for="male">Laki-laki</label>
                <input name="gender" id="female" value=0 type="radio" />
                <label for="female">Perempuan</label>

                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
