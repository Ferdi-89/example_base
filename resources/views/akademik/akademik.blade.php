<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body class="container">
    <h2 class="display-1 ">Daftar mahasiswa</h2>
    <div class="mt-5">
        <ol class="list-group">
            @foreach ($arrMhs1 as $item)
                <li class="list-group-item list-style">{{ $item }}</li>
            @endforeach
            @foreach ($arrMhs2 as $item)
                <li class="list-group-item">{{ $item }}</li>
            @endforeach
            @foreach ($arrMhs3 as $item)
                <li class="list-group-item">{{ $item }}</li>
            @endforeach
        </ol>
    </div>


    <div class="mt-2 ms-2">
        Padang, , &copy; <?= date('Y') ?> PNP
    </div>

    <div class="mt-3">
        <img class="me-5" src="/images/logo poli.svg" alt="Logo Poli" width="100" height="100">
        <img src="/images/ti.png" alt="Logo Poli" width="100" height="100">
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmxc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
