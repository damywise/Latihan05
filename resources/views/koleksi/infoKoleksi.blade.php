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

                    <form method="POST" action="{{ route('koleksi.koleksiUpdate') }}">
                        @csrf
            
                        <x-text-input id="id" name="id" value="{{$collection->id}}" hidden/>

                        <!-- ID Koleksi -->
                        <div>
                            <x-input-label for="idKoleksi" :value="__('ID Koleksi')" />
            
                            <x-text-input id="idKoleksi" class="block mt-1 w-full bg-gray-300" type="text" name="idKoleksi" value="{{$collection->id}}"  readonly/>

                        </div>
            
                        <!-- Nama Koleksi -->
                        <div>
                            <x-input-label for="namaKoleksi" :value="__('Nama Koleksi')" />
            
                            <x-text-input id="namaKoleksi" class="block mt-1 w-full bg-gray-300" type="text" name="namaKoleksi" value="{{$collection->namaKoleksi}}" readonly />
            
                            <x-input-error :messages="$errors->get('namaKoleksi')" class="mt-2" />
                        </div>
            
                        <!-- Jenis Koleksi -->
                        <div class="mt-4 mb-4">
                            <x-input-label for="jenisKoleksi" :value="old('jenisKoleksi')" > Jenis Koleksi </x-input-label>
            
                            <input name="jenisKoleksi" id="book" value=1 type="radio" @if(old('jenis', $collection->jenisKoleksi) == 1) checked @endif />
                            <label for="book">Buku</label>
                            <input name="jenisKoleksi" id="magazine" value=2 type="radio" @if(old('jenis', $collection->jenisKoleksi) == 2) checked @endif />
                            <label for="magazine">Majalah</label>
                            <input name="jenisKoleksi" id="CD" value=3 type="radio" @if(old('jenis', $collection->jenisKoleksi) == 3) checked @endif />
                            <label for="CD">Cakram Digital</label>
            
                            <x-input-error :messages="$errors->get('jenisKoleksi')" class="mt-2" />
                        </div>
            
                        <!-- Jumlah Awal -->
                        <div>
                            <x-input-label for="jumlahAwal" :value="__('Jumlah Awal')" />
            
                            <x-text-input id="jumlahAwal" class="block mt-1 w-full bg-gray-300" type="number" name="jumlahAwal" value="{{$collection->jumlahAwal}}" readonly/>
            
                            <x-input-error :messages="$errors->get('jumlahAwal')" class="mt-2" />
                        </div>
            
                        <!-- Jumlah Sisa -->
                        <div>
                            <x-input-label for="jumlahSisa" :value="__('Jumlah Sisa')" />
            
                            <x-text-input id="jumlahSisa" class="block mt-1 w-full" type="number" name="jumlahSisa" value="{{$collection->jumlahSisa}}" required/>
            
                            <x-input-error :messages="$errors->get('jumlahSisa')" class="mt-2" />
                        </div>
            
                        <!-- Jumlah Keluar -->
                        <div>
                            <x-input-label for="jumlahKeluar" :value="__('Jumlah Keluar')" />
            
                            <x-text-input id="jumlahKeluar" class="block mt-1 w-full" type="number" name="jumlahKeluar" value="{{$collection->jumlahKeluar}}" required/>
            
                            <x-input-error :messages="$errors->get('jumlahKeluar')" class="mt-2" />
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