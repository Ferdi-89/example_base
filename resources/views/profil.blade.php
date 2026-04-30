<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <style>
        body {
            background-color: black;
            padding: 0;
            margin: 0; 
        }

        h1 {
            color: red;
            font-family: sans-serif;
        }
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class='container'>
    <h1>WELCOME {{ $nama }}</h1>
    </div>
</body>
</html>