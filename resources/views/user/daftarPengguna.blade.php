<?php
$headerClass = 'px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider';
$rowClass = 'px-5 py-5 border-b border-gray-200 bg-white text-sm';
$headers = ['Id', 'Username', 'Full Name', 'Email', 'Alamat', 'No. Telepon', 'Tanggal Lahir', 'Agama', 'Jenis Kelamin'];
?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <table id="tableUserInfo" class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                @foreach ($headers as $header)
                                    <th class="{{ $headerClass }}"> {{ $header }} </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="{{ $rowClass }}">
                                        {{ $user->id ?? '' }}
                                    </td>
                                    <td class="{{ $rowClass }}">
                                        {{ $user->username ?? '' }}
                                    </td>
                                    <td class="{{ $rowClass }}">
                                        {{ $user->fullName ?? '' }}
                                    </td>
                                    <td class="{{ $rowClass }}">
                                        {{ $user->email ?? '' }}
                                    </td>
                                    <td class="{{ $rowClass }}">
                                        {{ $user->address ?? '' }}
                                    </td>
                                    <td class="{{ $rowClass }}">
                                        {{ $user->phoneNumber ?? '' }}
                                    </td>
                                    <td class="{{ $rowClass }}">
                                        {{ $user->birthdate ?? '' }}
                                    </td>
                                    <td class="{{ $rowClass }}">
                                        {{ $user->religion ?? '' }}
                                    </td>
                                    <td class="{{ $rowClass }}">
                                        {{ $user->gender == 0 ? 'Perempuan' : 'Laki-Laki' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
