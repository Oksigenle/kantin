<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use App\Laporan;

class LaporanExport implements FromQuery, WithHeadings, WithMapping
{
    public function query()
    {
        return laporan::query();
    }

    public function map($laporan): array
    {
        return [
            $laporan->nama_pembeli,
            $laporan->nama_produk,
            $laporan->harga,
            $laporan->jumlah,
            $laporan->total,
            $laporan->created_at->format('d/m/Y')
        ];
    }

    public function headings(): array
    {
        return [
            'nama pembeli',
            'nama produk',
            'harga produk',
            'jumlah',
            'total bayar',
            'tanggal pembeli',
        ];
    }
}
