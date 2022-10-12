<x-popup domId="addPopup">
    <h1>Input</h1>
    <form action="{{ route('anggota.store') }}" method="POST" style="max-width: 20em;">
      @csrf
      <div>
        <label for="namaAnggota">Nama Anggota</label>
        <input type="text" id="namaAnggota" name="namaAnggota">
      </div>
      <div>
        <label for="jenisKelamin">Gender</label>
        <div class="radios">
          <div>
            <input type="radio" name="jenisKelamin" id="lakilaki" value="Laki-laki">
            <label for="lakilaki">Laki-laki</label>
          </div>
          <div>
            <input type="radio" name="jenisKelamin" id="perempuan" value="Perempuan">
            <label for="perempuan">Perempuan</label>
          </div>
          <div>
            <input type="radio" name="jenisKelamin" id="lainnya" value="Lainnya/Tdk Disebut">
            <label for="lainnya">Lainnya/Tidak Disebut</label>
          </div>
        </div>
      </div>
      <div>
        <label for="tempatLahir">Tempat Lahir</label>
        <input type="text" id="tempatLahir" name="tempatLahir">
      </div>
      <div>
        <label for="tanggalLahir">Tanggal Lahir</label>
        <input type="date" id="tanggalLahir" name="tanggalLahir">
      </div>
      <div>
        <label for="alamat">Alamat</label>
        <textarea id="alamat" name="alamat"></textarea>
      </div>
      <div>
        <label for="noTelepon">No. Telepon</label>
        <input type="text" id="noTelepon" name="noTelepon">
      </div>
      <div>
        <label for="noId">No. Identitas</label>
        <input type="text" id="noId" name="noIdentitas" />
      </div>
      <div>
        <label for="pwd">Password</label>
        <input type="password" id="pwd" name="pwd" />
      </div>
      <button type="submit" class="bubsbutton">Submit</button>
    </form>
  </x-popup>