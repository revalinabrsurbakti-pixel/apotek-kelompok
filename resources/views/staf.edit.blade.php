<h2>Edit Data Staf Apotek</h2>

<form action="{{ route('staf.update', $staf->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama</label>
    <input type="text" name="nama" value="{{ $staf->nama }}" required>

    <label>Alamat</label>
    <textarea name="alamat" required>{{ $staf->alamat }}</textarea>

    <label>Tanggal Lahir</label>
    <input type="date" name="tanggal_lahir" value="{{ $staf->tanggal_lahir }}" required>

    <label>Tempat Lahir</label>
    <input type="text" name="tempat_lahir" value="{{ $staf->tempat_lahir }}" required>

    <label>No HP</label>
    <input type="text" name="no_hp" value="{{ $staf->no_hp }}" required>

    <button type="submit">Update</button>
    <a href="{{ route('staf.index') }}">Kembali</a>
</form>
