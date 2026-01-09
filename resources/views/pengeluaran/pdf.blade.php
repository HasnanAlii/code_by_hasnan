<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pengeluaran</title>
    <style>
        /* 1. RESET & TYPOGRAPHY */
        body {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
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
            border-bottom: 1px solid #ddd;
        }
        .header-table { width: 100%; }
        /* Placeholder Logo jika gambar tidak loading/tidak ada */
        .logo-placeholder {
            width: 50px; height: 50px;
            background: #dc2626; /* Merah untuk Pengeluaran */
            color: #fff;
            border-radius: 4px;
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

        /* 4. TABEL UTAMA (Minimalist) */
        table.main-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        table.main-table th {
            text-align: left;
            padding: 12px 5px;
            border-bottom: 2px solid #334155;
            font-size: 8pt;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #334155;
        }
        table.main-table td {
            padding: 10px 5px;
            border-bottom: 1px solid #f1f5f9;
            color: #334155;
            vertical-align: top;
        }
        table.main-table tr:last-child td { border-bottom: none; }

        /* 5. INDIKATOR & UTILS */
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        
        /* Warna Merah Khusus Pengeluaran */
        .amount-expense { color: #dc2626; font-weight: 600; } 

        /* 6. SUMMARY SECTION */
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
            padding: 12px 0;
            border-bottom: 1px solid #e2e8f0;
            color: #475569;
        }
        .summary-table .total-row td {
            border-top: 2px solid #334155;
            border-bottom: none;
            color: #dc2626; /* Merah di Total */
            font-weight: bold;
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
                    {{-- Opsi 1: Logo Gambar (Uncomment jika ingin pakai gambar) --}}
                    {{-- <img src="{{ public_path('assets/logo.png') }}" width="60" style="border-radius: 4px;"> --}}
                    
                    {{-- Opsi 2: Logo Text (Placeholder) --}}
                    <div class="logo-placeholder">OUT</div>
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
        <div class="report-title">Laporan Pengeluaran</div>
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
                <th width="20%">Tanggal</th>
                <th width="50%">Keterangan Pengeluaran</th>
                <th width="25%" class="text-right">Jumlah (IDR)</th>
            </tr>
        </thead>
        <tbody>
            @php $totalPengeluaran = 0; @endphp

            @forelse($pengeluaran as $i => $item)
                @php $totalPengeluaran += $item->jumlah; @endphp
                <tr>
                    <td class="text-center" style="color: #94a3b8;">{{ $i + 1 }}</td>
                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                    <td>
                        <span style="color: #334155;">{{ $item->keterangan ?? '-' }}</span>
                    </td>
                    <td class="text-right amount-expense">
                        Rp {{ number_format($item->jumlah, 0, ',', '.') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center" style="padding: 30px; color: #94a3b8; font-style: italic;">
                        Tidak ada data pengeluaran untuk periode ini.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- RINGKASAN --}}
    <div class="summary-wrapper">
        <table class="summary-table">
            <tr class="total-row">
                <td>Total Pengeluaran</td>
                <td class="text-right">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</td>
            </tr>
        </table>
    </div>

    {{-- FOOTER --}}
    <div class="footer">
        Dokumen ini digenerate otomatis oleh sistem Code By Hasnan &copy; {{ date('Y') }}
    </div>

</body>
</html>