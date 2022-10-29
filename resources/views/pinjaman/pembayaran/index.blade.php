<x-layout>
  <main>
    <div class="flex flex-row align-center gap-4 mb-4">
      <a href="{{route('pinjaman.index')}}">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width: 1.5em; height: auto;"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="#FAFAFA" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg></a>
        <h1>Pembayaran</h1>
    </div>
    @if (session('status'))
    <div class="message">
      <p><b>{{session('status')['status']}}</b> {{session('status')['message']}}</p>
    </div>
    @endif
    <div>
      <div id="datapinjaman" class="max-w-[20em] box">
        <h2>Data Pinjaman</h2>
        <p>No. Pinjaman: {{$dataPinjaman->idPinjaman}}</p>
        <p>Tanggal Pinjaman: {{$dataPinjaman->tanggalPinjaman}}</p>
        <p>Nama Peminjam: {{$dataAnggota->namaAnggota}}</p>
        <p>Jumlah Pinjaman: Rp. {{$dataPinjaman->jumlah}},-</p>
      </div>
      <div class="box mt-5">
        <div class="tablecontainer">
          <table>
            <thead>
              <tr>
                <th>Cicilan ke-</th>
                <th>Angsuran</th>
                <th>Bunga</th>
                <th>Total</th>
                <th>Tgl. Bayar</th>
                <th>Jml. Terbayar</th>
                <th>Sisa</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dataDetail as $det)
              <tr>
                <td>{{$det->cicilan}}</td>
                <td>Rp. {{$det->angsuran}},-</td>
                <td>Rp. {{$det->bunga}},-</td>
                <td>Rp. {{$det->angsuran + $det->bunga}},-</td>
                <form action="{{ route('pembayaran.bayar', ['idPinjaman'=>$dataPinjaman->idPinjaman, 'idDetail'=>$det->idDetail]) }}" method="POST">
                  @method('PUT')
                  @csrf
                <td>
                  <input type="date" id="tanggalPembayaran" name="tanggalPembayaran"
                  value={{$det->tanggalPembayaran}} />
                </td>
                <td>
                  <input type="number" id="jumlahTerbayar" name="jumlahPembayaran" 
                  class="max-w-fit" value="{{$det->jumlahPembayaran}}"/>
                </td>
                <td>
                  {{($det->angsuran + $det->bunga) - $det->jumlahPembayaran}}
                </td>
                <td>
                  <button action="submit" class="bubsbutton">Tambah</button>
                </td>
                </form>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
</x-layout>