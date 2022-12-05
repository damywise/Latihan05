<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{ url('detailTransactionUpdate') }}">
                        @csrf

                        <!-- ID Transaksi -->
                        <div>
                            <x-input-label for="idTransaksi" :value="__('ID Detail Transaksi')" />
            
                            <x-text-input id="idTransaksi" class="block mt-1 w-full bg-gray-300" type="text" name="idTransaksi" value="{{$detailTransaction->idTransaksi}}"  readonly/>

                        </div>

                        <!-- ID Detail Transaksi -->
                        <div>
                            <x-input-label for="idDetailTransaction" :value="__('ID Detail Transaksi')" />
            
                            <x-text-input id="idDetailTransaction" class="block mt-1 w-full bg-gray-300" type="text" name="idDetailTransaction" value="{{$detailTransaction->id}}"  readonly/>

                        </div>

                        <!-- Peminjam -->
                        <div>
                            <x-input-label for="idPeminjam" :value="__('Peminjam')" />
            
                            <x-text-input id="idPeminjam" class="block mt-1 w-full bg-gray-300" type="text" name="idPeminjam" value="{{$detailTransaction->namaPeminjam}}"  readonly/>

                        </div>

                        <!-- Petugas -->
                        <div>
                            <x-input-label for="idPetugas" :value="__('Petugas')" />
            
                            <x-text-input id="idPetugas" class="block mt-1 w-full bg-gray-300" type="text" name="idPetugas" value="{{$detailTransaction->namaPetugas}}"  readonly/>

                        </div>

                        <!-- Koleksi -->
                        <div>
                            <x-input-label for="idKoleksi" :value="__('Koleksi')" />
            
                            <x-text-input id="idKoleksi" class="block mt-1 w-full bg-gray-300" type="text" name="idKoleksi" value="{{$detailTransaction->koleksi}}"  readonly/>

                        </div>

                        <!-- Status  -->
                        <div class="mt-4 mb-4">
                            <x-input-label for="status" :value="__('Status')" />

                            <select class="form-select appearance-none
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
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="status" name="status">
                                <option value="-1">--Pilih dahulu--</option>
                                <option value="1" @if (old('status', $detailTransaction->status) == 1) selected @endif>Pinjam</option>
                                <option value="2" @if (old('status', $detailTransaction->status) == 2) selected @endif>Kembali</option>
                                <option value="3" @if (old('status', $detailTransaction->status) == 3) selected @endif>Hilang</option>
                            </select>

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