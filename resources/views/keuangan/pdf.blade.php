<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Keuangan</title>
    <style>
        /* 1. RESET & TYPOGRAPHY */
        body {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; /* Font standar profesional */
            font-size: 10pt;
            color: #333;
            line-height: 1.5;
            margin: 0;
            padding: 0;
        }

        /* 2. HEADER / KOP (Clean Style) */
        .header-container {
            width: 100%;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #ddd; /* Garis tipis halus */
        }
        .header-table { width: 100%; }
        .logo-placeholder {
            width: 50px; height: 50px;
            background: #1e293b; color: #fff;
            border-radius: 4px; /* Sedikit rounded, tidak bulat penuh */
            text-align: center; line-height: 50px;
            font-weight: bold; font-size: 14pt;
        }
        .company-name { font-size: 16pt; font-weight: 700; color: #1e293b; letter-spacing: -0.5px; margin: 0; }
        .company-meta { font-size: 9pt; color: #64748b; margin: 0; }
        .print-date { font-size: 8pt; color: #94a3b8; text-align: right; vertical-align: bottom; }

        /* 3. JUDUL LAPORAN */
        .report-section { margin-bottom: 25px; }
        .report-title { 
            font-size: 12pt; 
            text-transform: uppercase; 
            letter-spacing: 1px; 
            font-weight: bold; 
            color: #1e293b;
            margin-bottom: 5px;
        }
        .report-period { font-size: 10pt; color: #475569; }

        /* 4. TABEL UTAMA (Minimalist - No Vertical Borders) */
        table.main-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        /* Header Tabel: Putih bersih dengan garis bawah tebal */
        table.main-table th {
            text-align: left;
            padding: 12px 5px;
            border-bottom: 2px solid #334155; /* Garis tegas */
            font-size: 8pt;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px; /* Kesan elegan */
            color: #334155;
        }

        /* Isi Tabel */
        table.main-table td {
            padding: 10px 5px;
            border-bottom: 1px solid #f1f5f9; /* Garis pemisah sangat halus */
            color: #334155;
            vertical-align: top;
        }
        
        /* Baris terakhir tabel */
        table.main-table tr:last-child td { border-bottom: none; }

        /* 5. INDIKATOR WARNA & BADGE (Subtle) */
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        
        .amount-masuk { color: #059669; font-weight: 600; } /* Emerald Green */
        .amount-keluar { color: #dc2626; font-weight: 600; } /* Red */
        
        /* Badge dibuat outline agar tidak terlalu mencolok */
        .badge {
            font-size: 7pt;
            padding: 2px 6px;
            border-radius: 3px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }
        .badge-projek { background: #eff6ff; color: #2563eb; border: 1px solid #dbeafe; }
        .badge-op { background: #fef2f2; color: #dc2626; border: 1px solid #fee2e2; }
        .badge-umum { background: #f8fafc; color: #64748b; border: 1px solid #e2e8f0; }

        /* 6. SUMMARY SECTION (Aligned Right) */
        .summary-wrapper {
            width: 100%;
            margin-top: 10px;
        }
        .summary-table {
            width: 40%;
            float: right;
            border-collapse: collapse;
        }
        .summary-table td {
            padding: 8px 0;
            border-bottom: 1px solid #e2e8f0;
            color: #475569;
        }
        .summary-table .total-row td {
            border-top: 2px solid #334155;
            border-bottom: none;
            color: #1e293b;
            font-weight: bold;
            padding-top: 12px;
            font-size: 11pt;
        }

        /* 7. FOOTER */
        .footer {
            position: fixed; bottom: 0; left: 0; right: 0;
            border-top: 1px solid #ddd;
            padding-top: 10px;
            font-size: 8pt; color: #94a3b8;
            text-align: center;
        }
    </style>
</head>
<body>

    {{-- HEADER --}}
    <div class="header-container">
        <table class="header-table">
            <tr>
                <td style="width: 70px; vertical-align: top;">
                    <div class="logo-placeholder">CH</div>
                </td>
                <td style="vertical-align: top;">
                    <h1 class="company-name">Code By Hasnan</h1>
                    <p class="company-meta">Software House & IT Consultant</p>
                    <p class="company-meta">Email: ahasnan32@gmail.com</p>
                </td>
                <td class="print-date">
                    Dicetak: {{ now()->translatedFormat('d F Y, H:i') }}
                </td>
            </tr>
        </table>
    </div>

    {{-- JUDUL LAPORAN --}}
    <div class="report-section">
        <div class="report-title">Laporan Keuangan</div>
        <div class="report-period">
            Periode: 
            @if(request('filter') === 'harian' && request('tanggal'))
                {{ \Carbon\Carbon::parse(request('tanggal'))->translatedFormat('d F Y') }}
            @elseif(request('filter') === 'bulanan' && request('bulan'))
                {{ \Carbon\Carbon::parse(request('bulan'))->translatedFormat('F Y') }}
            @elseif(request('filter') === 'tahunan' && request('tahun'))
                Tahun {{ request('tahun') }}
            @else
                Semua Data
            @endif
        </div>
    </div>

    {{-- TABEL DATA --}}
    <table class="main-table">
        <thead>
            <tr>
                <th width="5%" class="text-center">No</th>
                <th width="15%">Tanggal</th>
                <th width="12%">Tipe</th>
                <th width="43%">Keterangan</th>
                <th width="25%" class="text-right">Jumlah (IDR)</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalMasuk = 0;
                $totalKeluar = 0;
            @endphp

            @forelse($keuangans as $i => $item)
                @php
                    if ($item->jenis === 'masuk') $totalMasuk += $item->jumlah;
                    if ($item->jenis === 'keluar') $totalKeluar += $item->jumlah;

                    $kategori = 'Lainnya';
                    $badgeClass = 'badge-umum';
                    
                    if ($item->jenis == 'masuk') {
                        $kategori = 'masuk';
                        $badgeClass = 'badge-projek';
                    } else {
                        $kategori = 'keluar';
                        $badgeClass = 'badge-op';
                    }
                @endphp
                <tr>
                    <td class="text-center" style="color: #94a3b8;">{{ $i + 1 }}</td>
                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                    <td>
                        <span class="badge {{ $badgeClass }}">
                            {{ $kategori }}
                        </span>
                    </td>
                    <td>
                        <span style="display: block; color: #334155;">{{ $item->keterangan ?? '-' }}</span>
                        @if($item->id_projek && isset($item->projek->nama))
                            <span style="font-size: 8pt; color: #94a3b8; margin-top: 2px; display: block;">
                                Ref: {{ $item->projek->nama }}
                            </span>
                        @endif
                    </td>
                    <td class="text-right">
                        @if($item->jenis === 'masuk')
                            <span class="amount-masuk">+ {{ number_format($item->jumlah, 0, ',', '.') }}</span>
                        @else
                            <span class="amount-keluar">- {{ number_format($item->jumlah, 0, ',', '.') }}</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center" style="padding: 30px; color: #94a3b8; font-style: italic;">
                        Belum ada data transaksi untuk periode ini.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- RINGKASAN --}}
    <div class="summary-wrapper">
        <table class="summary-table">
            <tr>
                <td>Total Pemasukan</td>
                <td class="text-right amount-masuk">{{ number_format($totalMasuk, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Total Pengeluaran</td>
                <td class="text-right amount-keluar">({{ number_format($totalKeluar, 0, ',', '.') }})</td>
            </tr>
            <tr class="total-row">
                <td>Saldo Akhir</td>
                <td class="text-right">Rp {{ number_format($item->saldo_akhir, 0, ',', '.') }}</td>
            </tr>
        </table>
    </div>

    {{-- FOOTER --}}
    <div class="footer">
        Dokumen ini digenerate otomatis oleh sistem Code By Hasnan &copy; {{ date('Y') }}
    </div>

</body>
</html>