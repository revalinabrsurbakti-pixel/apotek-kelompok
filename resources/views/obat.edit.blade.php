<h2>Edit Data Obat</h2>

<form action="{{ route('obat.update', $obat->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama Obat</label>
    <input type="text" name="nama_obat" value="{{ $obat->nama_obat }}" required>

    <label>Stock Obat</label>
    <input type="number" name="stock_obat" value="{{ $obat->stock_obat }}" min="0" required>

    <label>Tanggal Kedaluwarsa</label>
    <input type="date" name="tanggal_kedaluwarsa" value="{{ $obat->tanggal_kedaluwarsa }}" required>

    <button type="submit">Update</button>
    <a href="{{ route('obat.index') }}">Kembali</a>
</form>
