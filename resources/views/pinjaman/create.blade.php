<x-layout>
  <main>
    <div style="display: flex; align-items: center; gap: 1em; margin-bottom: 1em;">
      <a href="{{route('pinjaman.index')}}">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width: 1.5em; height: auto;"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="#FAFAFA" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg></a>
        <h1>Tambah</h1>
    </div>

    @if (session('status'))
    <div class="message">
      <p><b>{{session('status')['status']}}</b> {{session('status')['message']}}</p>
    </div>
    @endif

    <form action={{route('pinjaman.store')}} method="POST" class="max-w-[20em]">
      @csrf
      <div>
        <label>No. Anggota</label>
        <input type="text" id="noAnggota" name="noAnggota" />
      </div>
      <div>
        <label>Tanggal Pinjaman</label>
        <input type="date" id="tanggalPinjaman" name="tanggalPinjaman" />
      </div>
      <div>
        <label>Lama Peminjaman (bulan)</label>
        <select id="lama" name="lama">
          <option value="3">3 bulan</option>
          <option value="6">6 bulan</option>
          <option value="12">12 bulan</option>
        </select>
      </div>
      <div>
        <label>Bunga (%)</label>
        <input type="number" id="bunga" name="bunga" />
      </div>
      <div>
        <label>Jumlah</label>
        <input type="number" id="jumlah" name="jumlah" style="max-width: 20em" />
      </div>
      <button type="submit" class="bubsbutton">Tambah</button>
    </form>
  </main>
</x-layout>