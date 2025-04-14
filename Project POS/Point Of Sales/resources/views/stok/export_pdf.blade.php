<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            margin: 6px 20px 5px 20px;
            line-height: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            padding: 4px 3px;
        }

        th {
            text-align: left;
            border-bottom: 1px solid black;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .font-11 {
            font-size: 11pt;
        }

        .font-13 {
            font-size: 13pt;
        }

        .border-bottom-header {
            border-bottom: 1px solid;
        }

        .border-table th,
        .border-table td {
            border: 1px solid black;
        }

        .border-table {
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <table class="border-bottom-header">
        <tr>
            <td width="15%" class="text-center"><img src="polinema-bw.png" width="150" height="auto"></td>
            <td width="85%">
                <span class="text-center d-block font-11 font-bold mb-1">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN
                    TEKNOLOGI</span>
                <span class="text-center d-block font-13 font-bold mb-1">POLITEKNIK NEGERI MALANG</span>
                <span class="text-center d-block font-10">Jl. Soekarno-Hatta No. 9 Malang 65141</span>
                <span class="text-center d-block font-10">Telepon (0341) 404424 Pes. 101-105, 0341-404420, Fax. (0341)
                    404420</span>
                <span class="text-center d-block font-10">Laman: www.polinema.ac.id</span>
            </td>
        </tr>
    </table>

    <h3 class="text-center">LAPORAN STOK BARANG</h3>

    <table class="border-table font-11">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Nama Barang</th>
                <th class="text-center">Tanggal</th>
                <th class="text-right">Jumlah</th>
                <th>Petugas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stok as $s)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $s->barang->barang_nama ?? '-' }}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($s->stok_tanggal)->format('Y-m-d') }}</td>
                    <td class="text-right">{{ $s->stok_jumlah }}</td>
                    <td>{{ $s->user->nama ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>