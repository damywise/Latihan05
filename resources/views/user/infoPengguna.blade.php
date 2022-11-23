<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Info User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{ route('user.userUpdate') }}">
                        @csrf

                        <x-text-input id="id" name="id" value="{{$user->id}}" hidden/>

                        <!-- Username -->
                        <div>
                            <x-input-label for="username" :value="__('Username')" />

                            <x-text-input id="username" class="block mt-1 w-full bg-gray-300" type="text" name="username"
                                value="{{$user->username}}" readonly />
                        </div>

                        <!-- Full Name -->
                        <div>
                            <x-input-label for="fullName" :value="__('Full Name')" />

                            <x-text-input id="fullName" class="block mt-1 w-full" type="text" name="fullName"
                                :value="old('fullName', $user->fullName)" required autofocus />

                            <x-input-error :messages="$errors->get('fullName')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />

                            <x-text-input id="email" class="block mt-1 w-full bg-gray-300" type="email" name="email"
                                value="{{$user->email}}" readonly />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" required />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <!-- Alamat -->
                        <div>
                            <x-input-label for="address" :value="__('Alamat')" />

                            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address"
                                :value="old('address', $user->address)" required autofocus />

                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>


                        <!-- Tanggal Lahir -->
                        <div>
                            <x-input-label for="birthdate" :value="__('Tanggal Lahir')" />

                            <x-text-input id="birthdate" class="block mt-1 w-full bg-gray-300" type="date" name="birthdate"
                                value="{{$user->birthdate}}" readonly />
                        </div>

                        <!-- No Telepon -->
                        <div>
                            <x-input-label for="phoneNumber" :value="__('No Telepon')" />

                            <x-text-input id="phoneNumber" class="block mt-1 w-full" type="number" name="phoneNumber"
                                :value="old('phoneNumber', $user->phoneNumber)" required autofocus />

                            <x-input-error :messages="$errors->get('phoneNumber')" class="mt-2" />
                        </div>

                        <!-- Agama -->
                        <div>
                            <x-input-label for="religion" :value="__('Agama')" />
                            <div class="flex justify-center">
                                <div class="mb-3 w-full">
                                    <select name='religion' id='religion'
                                    :value="old('religion')"
                                        class="form-select appearance-none
                                                block
                                                w-full
                                                px-3
                                                py-1.5
                                                text-base
                                                font-normal
                                                text-gray-700
                                                bg-white bg-clip-padding bg-no-repeat
                                                border border-solid border-gray-300
                                                rounded
                                                transition
                                                ease-in-out
                                                m-0
                                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                        aria-label="Default select example">
                                        <option value="Islam" @if(old('jenis', $user->religion) == 1) selected @endif >Islam</option>
                                        <option value="Kristen" @if(old('jenis', $user->religion) == 2) selected @endif >Kristen</option>
                                        <option value="Hindu" @if(old('jenis', $user->religion) == 3) selected @endif >Hindu</option>
                                        <option value="Buddha" @if(old('jenis', $user->religion) == 4) selected @endif >Buddha</option>
                                        <option value="Konghucu" @if(old('jenis', $user->religion) == 5) selected @endif >Konghucu</option>
                                        <option value="Lainnya" @if(old('jenis', $user->religion) == 6) selected @endif >Lainnya</option>
                                    </select>
                                </div>
                            </div>

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

                            <x-primary-button class="ml-4">
                                {{ __('Submit') }}
                            </x-primary-button>
                            <x-secondary-button class="ml-4">
                                {{ __('Reset') }}
                            </x-secondary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
