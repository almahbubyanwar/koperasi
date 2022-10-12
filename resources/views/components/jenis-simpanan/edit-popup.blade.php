<x-popup>
    <h1>Input</h1>
    <form action="{{route('jenissimpanan.update', 0)}}" method="POST">
      @csrf
      @method('PUT')
      <input type="hidden" id="idJenis" name="idJenis">
      <div>
        <label for="namaJenis">Nama</label>
        <input type="text" id="namaJenisEdit" name="namaJenis">
      </div>
      <div>
        <label for="jumlahEdit">Jumlah</label>
        <input type="text" id="jumlahEdit" name="jumlah">
      </div>
      <button type="submit" class="bubsbutton">Submit</button>
    </form>
  </x-popup>