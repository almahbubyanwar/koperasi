<x-layout>
  <x-anggota.add-popup />
  <x-anggota.edit-popup />
  <main>
    <div class="head">
      <h1>Master Anggota</h1>
      <button id="addButton" class="bubsbutton">Tambah</a>
    </div>
    @if ($errors->any())
    <div class="alert">
      <p><b>Error</b></p>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
    @endif

    @if (session('status'))
      <div class="alert">
        <p>{{session('status')}}</p>
      </div>
    @endif

    @if (count($anggota) > 0)
    <div class="tablecontainer">
    <table>
      <tr>
        <th>No.</th>
        <th>Nama Anggota</th>
        <th>Gender</th>
        <th>Tempat Lahir</th>
        <th>Tgl. Lahir</th>
        <th>Alamat</th>
        <th>No. Telepon</th>
        <th>No. Identitas</th>
        <th>Action</th>
      </tr>

      @foreach ($anggota as $ag)
      <tr>
        <td>{{$ag->noAnggota}}</td>
        <td>{{$ag->namaAnggota}}</td>
        <td>{{$ag->jenisKelamin}}</td>
        <td>{{$ag->tempatLahir}}</td>
        <td>{{$ag->tanggalLahir}}</td>
        <td>{{$ag->alamat}}</td>
        <td>+{{$ag->noTelepon}}</td>
        <td>{{$ag->noIdentitas}}</td>
        <td class="actions">
          <button class="bubsbutton" onclick="edit({{$ag->noAnggota}})">Edit</button>
          <form method="POST" action={{route('anggota.destroy', $ag->noAnggota)}} class="inline">
            @csrf
            @method('DELETE')
            <button class="bubsbutton" type="submit">Hapus</button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
    </div>
    @else
    <h1>Tidak ada data.</h1>
    @endif
  </main>
</x-layout>
<script>
  let closeButtonEvent = (element) => {
    let closeButton = element.getElementsByClassName('close');
    closeButton[0].addEventListener('click', () => {
      element.style.visibility = 'hidden';
    })
  }

  let showElement = (element) => {
    element.style.visibility = 'visible';
    closeButtonEvent(element);
  }
  
  let addButton = document.getElementById('addButton');
  addButton.addEventListener('click', () => {
    let addPopup = document.getElementById('addPopup');
    showElement(addPopup);
  })
  const edit = function(noAnggota) {
    let editPopup = document.getElementById('editPopup');
    getAnggotaData(noAnggota, editPopup);
  }

  const setEditElement = function(json) {
    let data = json[0];
    document.getElementById('idEdit').value = data.noAnggota;
    document.getElementById('namaAnggotaEdit').value = data.namaAnggota;
    switch (data.jenisKelamin) {
      case 'Laki-laki':
        document.getElementById('lakilakiEdit').checked = true;
        break;
      case 'Perempuan':
        document.getElementById('perempuanEdit').checked = true;
        break;
      case 'Lainnya/Tdk Disebut':
        document.getElementById('lainnyaEdit').checked = true;
        break;
    }
    document.getElementById('tempatLahirEdit').value = data.tempatLahir;
    document.getElementById('tanggalLahirEdit').value = data.tanggalLahir;
    document.getElementById('alamatEdit').value = data.alamat;
    document.getElementById('noTeleponEdit').value = data.noTelepon;
    document.getElementById('noIdEdit').value = data.noIdentitas;
    document.getElementById('pwdEdit').value = data.pwd;
  }

  const getAnggotaData = async function(noAnggota, editPopup) {
      try {
      const rootURL = '{{URL::to('/')}}';
      const path = `/api/anggota/getData/${noAnggota}`;
      const url = rootURL + path;
      
      let response = await fetch(url);
      if (response.ok) {
        let json = await response.json();
        if (json) {
          console.log(json);
          setEditElement(json);
          showElement(editPopup);
        }
      }
    }
    catch (error) {
      console.log('Something has gone vewwy wrong :(( I\'m sowwy uwu');
      console.log(error);
    }
  }
</script>