<x-layout>
  <main>
    <div class="head">
      <h1>Simpanan</h1>
    </div>
    @if (session('status'))
    <div class="alert">
      <p>{{session('status')}}</p>
    </div>
    @endif
    <div id="container">
      <div id="left">
        <div id="add">
          <form action={{ route('simpanan.store') }} method="POST">
            @csrf
            <div>
              <label for="nomorAnggota">No. Anggota</label>
              <input type="text" id="noAnggota" name="noAnggota" 
              @if (isset($userId))
              value="{{$userId}}"
              @endif
              />
            </div>
            <div>
              <label for="tanggal">Tanggal</label>
              <input type="date" id="tanggal" name="tanggal">
            </div>
            <div>
              <label for="idJenis">Jenis Simpanan</label>
              <select name="idJenis" id="idJenis">
                <option value="" hidden disabled selected>Pilih jenis...</option>
                @foreach ($jenis as $j)
                <option value={{$j->idJenis}}>{{ $j->namaJenis }}</option>
                @endforeach
              </select>
            </div>
            <div>
              <p id="jumlah">Jumlah: </p>
            </div>
            <div>
              <button type="submit" class="bubsbutton">Tambah</button>
            </div>
          </form>
        </div>
        <div id="identity">
          <p id="namaOutput">Nama: </p>
          <p id="jenisKelaminOutput">Jenis Kelamin: </p>
          <p id="tglLahirOutput">TTL: </p>
          <p id="alamatOutput">Alamat: </p>
          <button id="cari" class="bubsbutton" disabled>Cari</button>
        </div>
      </div>
      <div id="right">
        <div id="tabledisplay">
          <h1>Tabel</h1>
          @if (count($simpanan) > 0) 
            <table>
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tanggal</th>
                  <th>No. <br>Anggota</th>
                  <th>Jenis</th>
                  <th>Jumlah</th>
                  <th>ID User</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($simpanan as $simp)
                <tr>
                  <td>{{ $simp->idSimpanan }}</td>
                  <td>{{ $simp->tanggal }}</td>
                  <td>{{ $simp->noAnggota }}</td>
                  <td>{{ $simp->idJenis }}</td>
                  <td>{{ $simp->jumlah }}</td>
                  <td>{{ $simp->userId }}</td>
                  <td>
                    <form action="{{route('simpanan.destroy', $simp->idSimpanan)}}" method="POST"
                      style="display: inline-block;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="bubsbutton">Hapus</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          @endif
        </div>
      </div>
    </div>
  </main>
</x-layout>
<script>
  const anggotaField = document.getElementById('noAnggota');

  async function getAnggota(id) {
    const rootUrl = "{{ URL::to('/') }}";
    const path = `/api/anggota/getData/${id}`;
    const url = rootUrl + path;

    try {
      const response = await fetch(url);
      if (response.ok) {
        let json = await response.json();
        json = json[0];
        if (json) {
          console.log(json);
          document.getElementById('namaOutput').innerText = `Nama: ${json.namaAnggota}`;
          document.getElementById('jenisKelaminOutput').innerText = `Jenis Kelamin: ${json.jenisKelamin}`;
          document.getElementById('tglLahirOutput').innerText = `TTL: ${json.tempatLahir}, ${json.tanggalLahir}`;
          document.getElementById('alamatOutput').innerText = `Alamat: ${json.alamat}`;
          
          const cariButton = document.getElementById('cari');
          cariButton.disabled = false;
          cariButton.addEventListener('click', () => {
            location = location.origin + '/simpanan/search/' + anggotaField.value;
          })
        }
      }
    }
    catch(error) {
      console.log('Oh nyo! ' + error);
    }
  }

  async function getJumlah(id) {
    const rootUrl = "{{ URL::to('/') }}";
    const path = `/api/jenissimpanan/getData/${id}`;
    const url = rootUrl + path;
    try {
      const response = await fetch(url);
      if (response.ok) {
        const json = await response.json();
        const jumlahField = document.getElementById('jumlah');
        jumlahField.innerText = "Jumlah: " + json.jumlah;
      }
      else {
        console.log('oh nyo!');
      }
    }
    catch (error) {
      console.log('Oh nyo! ' + error);
    }
  }

  anggotaField.addEventListener('input', () => {
    getAnggota(anggotaField.value);
  })

  const jenisOption = document.getElementById('idJenis');
  jenisOption.addEventListener('change', () => {
    getJumlah(jenisOption.value);
  })
</script>