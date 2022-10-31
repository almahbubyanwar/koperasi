<div class="w-[15em] h-screen sticky top-0 flex flex-col gap-1 bg-[#242424] py-4 px-6 text-[#FAFAFA] flex-shrink-0 justify-between">
   <h1><a href="/">Koperasi 24</a></h1>
   <nav class="flex flex-col gap-[0.2em]">
      <h2>Master</h2>
      <p><a href="/anggota">Anggota</a></p>
      <p><a href="/user">User</a></p>
      <p><a href="/jenissimpanan">Jenis Simpanan</a></p>
      <h2 class="mt-2">Transaksi</h2>
      <p><a href="/simpanan">Simpanan</a></p>
      <p><a href="/pengambilan">Pengambilan</a></p>
      <p><a href="/pinjaman">Pinjaman</a></p>
      <h2 class="mt-2">User</h2>
      <form action="/logout" method="POST">
         @csrf
         <button type="submit" class="bubsbutton">
            Log Out
         </button>
      </form>
      {{-- <p>Current user: {{ auth()->user()->name }}</p> --}}
   </nav>
</div>