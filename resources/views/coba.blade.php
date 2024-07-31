<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Saya</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: linear-gradient(to bottom, #000000, #ffffff);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-image: linear-gradient(to top, #fdfdfd, #411a5b);
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        .container img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
        }
        .container h1 {
            font-size: 24px;
            margin: 10px 0;
        }
        .container p {
            font-size: 21px;
            color: #000000;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="https://i.pinimg.com/originals/d9/c8/e3/d9c8e30ba4930c14134995d5026bddf2.gif" alt="Foto Profil">
        <h1><label for="username">Nama :</label> {{ $nama }}</h1>
        <p><label for="username">Alamat :</label> {{ $alamat }}</p>
        <p><label for="username">Umur :</label> {{ $umur }}</p>
        <p><label for="username">Asal Univ :</label> {{ $asaluniv }}</p>
        <p><label for="username">email :</label>  {{ $email }}</p>
    </div>
</body>
</html>
