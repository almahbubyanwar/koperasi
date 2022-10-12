<x-popup>
  <h1>Input</h1>
  <form action="{{route('jenissimpanan.store')}}" method="POST">
    @csrf
    <div>
      <label for="namaJenis">Nama</label>
      <input type="text" id="namaJenis" name="namaJenis">
    </div>
    <div>
      <label for="namaJenis">Jumlah</label>
      <input type="text" id="jumlah" name="jumlah">
    </div>
    <button type="submit" class="bubsbutton">Submit</button>
  </form>
</x-popup>