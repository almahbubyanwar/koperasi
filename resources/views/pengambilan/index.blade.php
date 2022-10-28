<x-layout>
  <main>
    <div class="head">
    <h1>Pengambilan</h1>
    </div>
    <div class="box w-[21rem]">
      <form class="flex flex-col gap-2" action="{{route('pengambilan.store')}}" method="POST">
        @csrf
        @method('POST')
        <div>
          <label>No. Anggota:</label>
          <div class="flex flex-row gap-1">
            <input type="text" id="noAnggota" name="noAnggota" />
            <button type="button" id="search" class="bubsbutton">Cari</button>
          </div>
        </div>
        <div>
          <label>Tgl. Pengambilan:</label>
          <input type="date" id="tanggalPengambilan" name="tanggalPengambilan" />
        </div>
        <div>
          <label>Jumlah</label>
          <input type="number" id="jumlah" name="jumlah" />
        </div>
        <button type="submit" class="bubsbutton">Tambah</button>
      </form>
    </div>
  </main>
</x-layout>
<script>
  let searchButton = document.getElementById('search');
  searchButton.addEventListener('click', () => {
    window.location.replace(window.location + '/search/' + document.getElementById('noAnggota').value);
  })
</script>