<?php
$headerClass = '';
$rowClass = 'px-5 py-5 border-b border-gray-200 bg-white text-sm';
$headers = ['Id', 'Nama Koleksi', 'Jenis Koleksi', 'Tanggal Dibuat', 'Jumlah Koleksi'];
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
                <div class="p-6 bg-white border-b border-gray-200 overflow-x-auto">

                    <a href="koleksi/koleksiTambah">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-5">
                            Tambah Data
                        </button>
                    </a>

                    <table id="tableUserInfo" class="data-table min-w-full leading-normal">
                        <thead>
                            <tr>
                                @foreach ($headers as $header)
                                    <th class="{{ $headerClass }}"> {{ $header }} </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('koleksi') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'namaKoleksi',
                        name: 'namaKoleksi'
                    },
                    {
                        data: 'jenisKoleksi',
                        name: 'jenisKoleksi'
                    },
                    {
                        data: 'createdAt',
                        name: 'createdAt'
                    },
                    {
                        data: 'jumlahKoleksi',
                        name: 'jumlahKoleksi'
                    },
                ]
            });
        });
    </script>
</x-app-layout>
