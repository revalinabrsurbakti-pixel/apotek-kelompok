<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Staf Apotek</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            background: white;
            font-family: Arial, sans-serif;
            font-size: 11px;
            color: black;
        }
        .container {
            width: 450px;
            margin-left: 75px;
            padding-top: 32px;
        }
        .judul { margin-bottom: 12px; }
        h3 { font-size: 11px; margin: 0 0 10px; }
        .form-group { margin-bottom: 7px; }
        label { display: block; margin-bottom: 7px; }
        input {
            display: block;
            width: 155px;
            height: 21px;
            border: 1px solid #75b85d;
            background: white;
            padding: 3px 5px;
            font-size: 11px;
        }
        input[type="date"] { height: 22px; }
        button {
            width: 69px;
            height: 31px;
            background: #4778ce;
            color: black;
            border: none;
            border-radius: 6px;
            font-size: 11px;
            cursor: pointer;
            margin-top: 3px;
        }
        .pesan { color: green; }
        .error { color: red; }
    </style>
</head>
<body>
<div class="container">
    <div class="judul">PROJEK KELOMPOK</div>
    <h3>Staf Apotek</h3>

    @if(session('success'))
        <p class="pesan">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p class="error">{{ $error }}</p>
        @endforeach
    @endif

    <form action="{{ route('staf.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Id Staff</label>
            <input type="text" value="Otomatis" disabled>
        </div>

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" required>
        </div>

        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" required>
        </div>

        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" required>
        </div>

        <div class="form-group">
            <label>No HP</label>
            <input type="text" name="no_hp" required>
        </div>

        <button type="submit">simpan</button>
    </form>
</div>
</body>
</html>
