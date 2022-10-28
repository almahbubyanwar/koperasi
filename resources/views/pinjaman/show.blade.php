<x-layout>
  <main>
    <div class="flex align-center gap-4 mb-4">
      <a href="{{route('pinjaman.index')}}">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width: 1.5em; height: auto;"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="#FAFAFA" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg></a>
        <h1>Pinjaman No. {{$dataPinjaman->idPinjaman}}</h1>
    </div>
    @if (session('status'))
    <div class="message">
      <p><b>{{session('status')['status']}}</b> {{session('status')['message']}}</p>
    </div>
    @endif
    <div class="flex flex-col gap-4">
      <div id="datapinjaman" class="max-w-[20em] p-5 bg-[#242424] rounded-[10px]">
        <h2>Data Pinjaman</h2>
        <p>No. Pinjaman: {{$dataPinjaman->idPinjaman}}</p>
        <p>Tanggal Pinjaman: {{$dataPinjaman->tanggalPinjaman}}</p>
        <p>Nama Peminjam: {{$dataAnggota->namaAnggota}}</p>
        <p>Jumlah Pinjaman: Rp. {{$dataPinjaman->jumlah}},-</p>
      </div>
      <div class="p-5 bg-[#242424] rounded-[10px] w-fit">
        <div id="table" class="tablecontainer">
          <table>
            <thead>
              <tr>
                <th>Cicilan Ke-</th>
                <th>Angsuran</th>
                <th>Bunga</th>
                <th>Tanggal Pembayaran</th>
                <th>Jumlah Pembayaran</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dataDetail as $item)
              <tr>
                <td>{{$item->cicilan}}</td>
                <td>Rp. {{$item->angsuran}}</td>
                <td>Rp. {{$item->bunga}}</td>
                <td>{{$item->tanggalPembayaran}}</td>
                <td>Rp. {{$item->jumlahPembayaran}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
</x-layout>