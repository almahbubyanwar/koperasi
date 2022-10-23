<x-layout>
  <main>
    <div class="head">
      <h1>Pinjaman Anggota</h1>
      <a href="{{ route('pinjaman.create') }}"><button class="bubsbutton">Tambah</button></a>
    </div>
    @if (session('status'))
    <div class="message">
      <p><b>{{session('status')['status']}}</b> {{session('status')['message']}}</p>
    </div>
    @endif

    @if (count($pinjaman) > 0)
    <div class="tablecontainer">
    <table>
      <thead>
        <tr>
          <th>No. Pinjaman</th>
          <th>Tanggal</th>
          <th>No. Anggota</th>
          <th>Lama (bulan)</th>
          <th>Jumlah</th>
          <th>Bunga</th>
          <th>Jml. Bayar</th>
          <th>Jml. Cicilan</th>
          <th>Sisa</th>
          <th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pinjaman as $p)
        <tr>
          <td><a href="{{route('pinjaman.show', $p->idPinjaman)}}">{{$p->idPinjaman}}</a></td>
          <td>{{$p->tanggalPinjaman}}</td>
          <td>{{$p->noAnggota}}</td>
          <td>{{$p->lama}}</td>
          <td>{{$p->jumlah}}</td>
          <td>{{$p->bunga}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
    @endif
  </main>
</x-layout>