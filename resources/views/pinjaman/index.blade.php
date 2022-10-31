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
          <th>Lama</th>
          <th>Jumlah</th>
          <th>Bunga</th>
          <th>Jumlah + Bunga</th>
          <th>Total Terbayar</th>
          <th>Sisa</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pinjaman as $p)
        <tr>
          @php ($jumlahBunga = $p->jumlah + ($p->jumlah * $p->bunga / 100))
          @php ($totalBayar = $jumlahBunga - $p->totalTerbayar)
          <td><a href="{{route('pinjaman.show', $p->idPinjaman)}}" class="underline">{{$p->idPinjaman}}</a></td>
          <td class="min-w-[9rem]">{{$p->tanggalPinjaman}}</td>
          <td>{{$p->noAnggota}}</td>
          <td class="min-w-[6rem]">{{$p->lama}} bulan</td>
          <td class="min-w-[8rem]">Rp. {{$p->jumlah}}</td>
          <td>{{$p->bunga}}%</td>
          <td class="min-w-[9rem]">Rp. {{$jumlahBunga}},-</td>
          <td class="min-w-[8rem]">Rp. {{$p->totalTerbayar}},-</td>
          <td class="min-w-[8rem]">Rp. {{($totalBayar > 0) ? $totalBayar : 0}},-</td>
          <td class="flex flex-row gap-1 flex-wrap">
            <form action="{{ route('pinjaman.destroy', $p->idPinjaman) }}" method="POST">
              @csrf
              @method('DELETE')
              <button action="submit" class="bubsbutton">Hapus</button>
            </form>
            <a href="{{ route('pembayaran.index', $p->idPinjaman) }}" class="bubsbutton">Bayar</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
    @endif
  </main>
</x-layout>