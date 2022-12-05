<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Koleksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{ route('koleksi.koleksiStore') }}">
                        @csrf
            
                        <!-- Nama Koleksi -->
                        <div>
                            <x-input-label for="namaKoleksi" :value="__('Nama Koleksi')" />
            
                            <x-text-input id="namaKoleksi" class="block mt-1 w-full" type="text" name="namaKoleksi" :value="old('namaKoleksi')" required autofocus />
            
                            <x-input-error :messages="$errors->get('namaKoleksi')" class="mt-2" />
                        </div>
            
                        <!-- Jenis Koleksi -->
                        <div class="mt-4 mb-4">
                            <x-input-label for="jenisKoleksi" :value="old('jenisKoleksi')" />
            
                            <input name="jenisKoleksi" id="book" value=1 type="radio" checked />
                            <label for="book">Buku</label>
                            <input name="jenisKoleksi" id="magazine" value=2 type="radio" />
                            <label for="magazine">Majalah</label>
                            <input name="jenisKoleksi" id="CD" value=3 type="radio" />
                            <label for="CD">Cakram Digital</label>
            
                            <x-input-error :messages="$errors->get('jenisKoleksi')" class="mt-2" />
                        </div>
            
                        <!-- Jumlah Koleksi -->
                        <div>
                            <x-input-label for="jumlahAwal" :value="__('Jumlah Koleksi')" />
            
                            <x-text-input id="jumlahAwal" class="block mt-1 w-full" type="number" name="jumlahAwal" :value="old('jumlahAwal')" required autofocus />
            
                            <x-input-error :messages="$errors->get('jumlahAwal')" class="mt-2" />
                        </div>
            
            
                        <div class="flex items-center justify-end mt-4">
            
                            <x-primary-button class="ml-4">
                                {{ __('Create') }}
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