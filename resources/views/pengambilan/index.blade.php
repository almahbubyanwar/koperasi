<x-layout>
  <main>
    <div class="head">
      <h1>Pengambilan</h1>
    </div>
    <x-status />
    <div class="flex flex-row flex-wrap gap-4">
      <div class="box w-[21rem] flex-shrink-0">
        <form class="flex flex-col gap-2" action="{{route('pengambilan.store')}}" method="POST">
          @csrf
          @method('POST')
          <div>
            <label>No. Anggota</label>
            <div class="flex flex-row gap-1">
              <input type="text" id="noAnggotaField" name="noAnggota" value="{{isset($anggota) ? $anggota->noAnggota : ""}}"/>
              <button type="button" id="search" class="bubsbutton">Cari</button>
            </div>
          </div>
          <div>
            <label>Tgl. Pengambilan</label>
            <input type="date" id="tanggalPengambilan" name="tanggalPengambilan" />
          </div>
          <div>
            <label>Jenis Simpanan</label>
            <select name="idJenis" id="idJenis">
              @if (isset($jenis))
                @foreach ($jenis as $j)
                  <option value="{{$j->idJenis}}">{{$j->namaJenis}}</option>      
                @endforeach
              @endif
            </select>
          </div>
          <div>
            <label>Jumlah</label>
            <input type="number" id="jumlah" name="jumlah" />
          </div>
          <button type="submit" class="bubsbutton">Tambah</button>
        </form>
      </div>

      @if (isset($search))
          <div class="flex flex-col flex-wrap gap-4">
            <div class="box w-fit h-fit max-w-full">
              @if (isset($anggota))
                <h2>Data Anggota</h2>
                <div class="[&>p]:leading-snug">
                  <p>No. Anggota: {{$anggota->noAnggota}}</p>
                  <p>Nama Anggota: {{$anggota->namaAnggota}}</p>
                  <p>Jumlah Simpanan: </p>
                  <ul>
                  @foreach ($simpanan as $simp)
                    <li><p>{{$simp->namaJenis}}: Rp. {{$simp->jumlah}}</p></li>
                  @endforeach
                  </ul>
                </div>
              @endif
              @if (isset($nop))
                <h1>Anggota Tidak Ditemukan.</h1>
              @endif
            </div>

            @if (count($pengambilan) > 0)
              <div class="box w-fit h-fit max-w-full">
                <h2>Histori Pengambilan</h2>
                <div class="tablecontainer">
                <table>
                  <thead>
                    <tr>
                      <th>Kode Pengambilan</th>
                      <th>Tanggal Pengambilan</th>
                      <th>No. Anggota</th>
                      <th>Jumlah Pengambilan</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($pengambilan as $p)
                      <tr>
                        <td>{{$p->idPengambilan}}</td>
                        <td>{{$p->tanggalPengambilan}}</td>
                        <td>{{$p->noAnggota}}</td>
                        <td>Rp. {{$p->jumlah}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                </div>
              </div>
          @endif
        @endif
      </div>
    </div>
  </main>
</x-layout>
<script>
  let searchButton = document.getElementById('search');
  searchButton.addEventListener('click', () => {
    window.location.replace(window.location.origin + '/pengambilan/search/' + document.getElementById('noAnggotaField').value);
  })

  let anggotaInput = document.getElementById('noAnggotaField');
  anggotaInput.addEventListener('input', () => {
    getJenis(anggotaInput.value);
  })

  async function getJenis(id) {
    const jenisBox = document.getElementById('idJenis')
    const rootUrl = "{{ URL::to('/') }}";
    const path = `/api/simpanan/getJenis/${id}`;
    const url = rootUrl + path;

    try {
      const response = await fetch(url);
      if (response.ok) {
        let json = await response.json();
        if (json) {
          jenisBox.innerHTML = "";
          for (item of json) {
            let option = document.createElement("option");
            option.text = item.namaJenis;
            option.value = item.idJenis;
            jenisBox.add(option);
          }
        }
      }
    }
    catch(error) {
      console.log('Oh nyo! ' + error);
    }
  }
</script>