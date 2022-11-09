<?php
$headerClass = 'px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider';
$rowClass = 'px-5 py-5 border-b border-gray-200 bg-white text-sm';
$headers = ['Id', 'Nama Koleksi', 'Jenis Koleksi', 'Tanggal Dibuat', 'Jumlah Koleksi'];
$jenisKoleksi = ['', 'Buku', 'Majalah', 'Cakram Digital'];
?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Info Koleksi') }}
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
                            <tr>
                                <td class="{{ $rowClass }}">
                                    {{ $collection->id ?? '' }}
                                </td>
                                <td class="{{ $rowClass }}">
                                    {{ $collection->namaKoleksi ?? '' }}
                                </td>
                                <td class="{{ $rowClass }}">
                                    {{ $jenisKoleksi[$collection->jenisKoleksi] ?? '' }}
                                </td>
                                <td class="{{ $rowClass }}">
                                    {{ date("Y/M/d", strtotime( $collection->createdAt ?? '' ))}}
                                </td>
                                <td class="{{ $rowClass }}">
                                    {{ $collection->jumlahKoleksi ?? '' }}
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
