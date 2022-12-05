<?php
$selectStyle = 'form-select appearance-none
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
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none';
?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{ url('transaksiStore') }}">
                        @csrf

                        <!-- Peminjam  -->
                        <div class="mt-4 mb-4">
                            <x-input-label for="idPeminjam" :value="__('Peminjam')" />

                            <select class="{{$selectStyle}}" id="idPeminjam" name="idPeminjam">
                                <option value="-1">--Pilih dahulu--</option>
                                @foreach ($users as $user)
                                    @if ($user->id == old('idPeminjam'))
                                        <option value="{{ $user->id }}" selected>{{ $user->fullName }}</option>
                                    @else
                                        <option value="{{ $user->id }}">{{ $user->fullName }}</option>
                                    @endif
                                @endforeach
                            </select>

                        </div>

                        <!-- Koleksi 1  -->
                        <div class="mt-4 mb-4">
                            <x-input-label for="idKoleksi1" :value="__('Koleksi 1')" />

                            <select class="{{$selectStyle}}" id="idKoleksi1" name="idKoleksi1">
                                <option value="-1">--Pilih dahulu--</option>
                                @foreach ($collections as $collection)
                                    @if ($collection->id == old('idKoleksi1'))
                                        <option value="{{ $collection->id }}" selected>{{ $collection->namaKoleksi }}</option>
                                    @else
                                        <option value="{{ $collection->id }}">{{ $collection->namaKoleksi }}</option>
                                    @endif
                                @endforeach
                            </select>

                        </div>

                        <!-- Koleksi 2  -->
                        <div class="mt-4 mb-4">
                            <x-input-label for="idKoleksi2" :value="__('Koleksi 2')" />

                            <select class="{{$selectStyle}}" id="idKoleksi2" name="idKoleksi2">
                                <option value="-1">--Pilih dahulu--</option>
                                @foreach ($collections as $collection)
                                    @if ($collection->id == old('idKoleksi2'))
                                        <option value="{{ $collection->id }}" selected>{{ $collection->namaKoleksi }}</option>
                                    @else
                                        <option value="{{ $collection->id }}">{{ $collection->namaKoleksi }}</option>
                                    @endif
                                @endforeach
                            </select>

                        </div>

                        <!-- Koleksi 3  -->
                        <div class="mt-4 mb-4">
                            <x-input-label for="idKoleksi3" :value="__('Koleksi 3')" />

                            <select class="{{$selectStyle}}" id="idKoleksi3" name="idKoleksi3">
                                <option value="-1">--Pilih dahulu--</option>
                                @foreach ($collections as $collection)
                                    @if ($collection->id == old('idKoleksi3'))
                                        <option value="{{ $collection->id }}" selected>{{ $collection->namaKoleksi }}</option>
                                    @else
                                        <option value="{{ $collection->id }}">{{ $collection->namaKoleksi }}</option>
                                    @endif
                                @endforeach
                            </select>

                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <x-primary-button class="ml-4">
                                {{ __('Create') }}
                            </x-primary-button>
                            <x-secondary-button class="ml-4">
                                {{ __('Reset') }}
                            </x-secondary-button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
