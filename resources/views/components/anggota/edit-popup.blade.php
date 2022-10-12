<x-popup domId="editPopup">
    <h1>Edit</h1>
    <form action="{{ route('anggota.update', 0) }}" method="POST" style="max-width: 20em;">
        @csrf
        @method('PUT')
        <input type="text" id="idEdit" name="noAnggota" style="display: none;">
        <div>
          <label for="namaAnggota">Nama Anggota</label>
          <input type="text" id="namaAnggotaEdit" name="namaAnggota">
        </div>
        <div>
          <label for="jenisKelamin">Gender</label>
          <div class="radios">
            <div>
              <input type="radio" name="jenisKelamin" id="lakilakiEdit" value="Laki-laki">
              <label for="lakilaki">Laki-laki</label>
            </div>
            <div>
              <input type="radio" name="jenisKelamin" id="perempuanEdit" value="Perempuan">
              <label for="perempuan">Perempuan</label>
            </div>
            <div>
              <input type="radio" name="jenisKelamin" id="lainnyaEdit" value="Lainnya/Tdk Disebut">
              <label for="lainnya">Lainnya/Tidak Disebut</label>
            </div>
          </div>
        </div>
        <div>
          <label for="tempatLahir">Tempat Lahir</label>
          <input type="text" id="tempatLahirEdit" name="tempatLahir">
        </div>
        <div>
          <label for="tanggalLahir">Tanggal Lahir</label>
          <input type="date" id="tanggalLahirEdit" name="tanggalLahir">
        </div>
        <div>
          <label for="alamat">Alamat</label>
          <textarea id="alamatEdit" name="alamat"></textarea>
        </div>
        <div>
          <label for="noTelepon">No. Telepon</label>
          <input type="text" id="noTeleponEdit" name="noTelepon">
        </div>
        <div>
          <label for="noId">No. Identitas</label>
          <input type="text" id="noIdEdit" name="noIdentitas" />
        </div>
        <div>
          <label for="pwd">Password</label>
          <input type="password" id="pwdEdit" name="pwd" />
        </div>
        <button type="submit" class="bubsbutton">Submit</button>
      </form>
</x-popup>