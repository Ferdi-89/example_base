<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Mahasiswa</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h2>Nilai Mahasiswa</h2>
        <div class="col-md-6 mt-3">

            <h4>1. Kondisi IF Else</h4>
            @if (($total_nilai >= 0) and ($total_nilai < 56))
                <div class="alert alert-danger"> Maaf, anda tidak lulus</div>
            @elseif (($total_nilai > 55) and ($total_nilai <= 100))
                <div class="alert alert-success"> Selamat, anda lulus</div>
            @endif

            <hr>
            <h4>2. Kondisi Switch Case</h4>
            @switch($total_nilai)
                @case(0)
                    <div class="alert alert-danger"> Sangat Jelek</div>
                    @break
                @case(70)
                    <div class="alert alert-primary"> Memuaskan</div>
                    @break
                @case(100)
                    <div class="alert alert-success"> Sangat Memuaskan</div>
                    @break
                @default
                    <div class="alert alert-warning"> Nilai tidak valid!</div>
            @endswitch

            <hr>
            <h4>3. Menampilkan Data</h4>
            <table class="table table-bordered table-striped mt-3">
                <tr class="text-md-center">
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Total Nilai</th>
                </tr>
                <tr>
                    <td>{{ $nama }}</td>
                    <td>{{ $nim }}</td>
                    <td>{{ $total_nilai }}</td>
                </tr>
            </table>

            <hr>
            <h4>4. Kontrol Perulangan For</h4>
            @for ($i = 0; $i < 5; $i++)
                Looping ke- {{ $i }} <br>
            @endfor

            <hr>
            <h4>5. Kontrol Perulangan While</h4>
            <?php $i = 1; ?>
            @while ($i <= 4)
                Looping ke- {{ $i }} <br>
                <?php $i++; ?>
            @endwhile

            <hr>
            <h4>6. Kontrol Perulangan Foreach</h4>
            Nilai =
            @foreach ($kumpulan_nilai as $nilai)
                <div class="alert alert-info d-inline-block mb-0"> {{ $nilai }} </div>
            @endforeach

            <hr>
            <h4>7. Kontrol Perulangan Forelse</h4>
            Nilai =
            @forelse ($kumpulan_nilai as $val)
                @if (($val >= 0) and ($val < 50))
                    <div class="alert alert-warning d-inline-block mb-0"> {{ $val }} </div>
                @elseif (($val >= 50) and ($val <= 100))
                    <div class="alert alert-success d-inline-block mb-0"> {{ $val }} </div>
                @endif
            @empty
                <div class="alert alert-danger d-inline-block mb-0"> Data tidak valid</div>
            @endforelse

            <hr>
            <h4>8. Perintah Continue dan Break</h4>
            <h5>Continue (Lewati nilai &lt; 50)</h5>
            Nilai =
            @foreach ($kumpulan_nilai as $nilai)
                @if ($nilai < 50)
                    @continue
                @endif
                <div class="alert alert-info d-inline-block mb-0"> {{ $nilai }} </div>
            @endforeach
            <br><br>
            <h5>Break (Berhenti jika nilai &lt; 50)</h5>
            Nilai =
            @foreach ($kumpulan_nilai as $nilai)
                @if ($nilai < 50)
                    @break
                @endif
                <div class="alert alert-info d-inline-block mb-0"> {{ $nilai }} </div>
            @endforeach

            <hr>
            <h4>9. Komentar dan PHP Mode</h4>
            {{-- Ini adalah komentar Blade, bagian ini diabaikan dan tidak akan dirender ke HTML browser --}}
            <?php
                $pesan_php = "Teks string ini merupakan variabel murni PHP yang dibuat menggunakan tag @php dan @endphp di dalam view.";
            ?>
            <p> {{ $pesan_php }} </p>

        </div>
    </div>
</body>
</html>
