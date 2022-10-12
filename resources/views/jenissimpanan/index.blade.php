<x-layout>
<x-jenis-simpanan.add-popup domId="addPopup" />
<x-jenis-simpanan.edit-popup domId="editPopup" />
  <main>
    <div class="head">
      <h1>Jenis Simpanan</h1>
      <button class="bubsbutton" id="addButton">Tambah</button>
    </div>

    @if (count($jenis) > 0)
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Jumlah</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($jenis as $jn)
          <tr>
            <td>{{$jn->idJenis}}</td>
            <td>{{$jn->namaJenis}}</td>
            <td>{{$jn->jumlah}}</td>
            <td><button id="editButton" class="bubsbutton" onclick="edit({{$jn->idJenis}})">Edit</button>
              <form action="{{route('jenissimpanan.destroy', $jn->idJenis)}}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button class="bubsbutton" type="submit">Hapus</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </main>
</x-layout>
<script>
    const showElement = (element) => {
    element.style.visibility = 'visible';
    closeButtonEvent(element);
  }
  
  const addButton = document.getElementById('addButton');
  addButton.addEventListener('click', () => {
    let addPopup = document.getElementById('addPopup');
    showElement(addPopup);
  })

  function setEditFields(json, element) {
    console.log(element);
    document.getElementById('idJenis').value = json.idJenis;
    document.getElementById('namaJenisEdit').value = json.namaJenis;
    document.getElementById('jumlahEdit').value = json.jumlah;
    showElement(element);
  }

    async function getJenis(id, element) {
      const rootURL = "{{ URL::to('/') }}";
      const path = `/api/jenissimpanan/getData/${id}`;
      const url = rootURL + path;

      try {
        let response = await fetch(url);
        if (response.ok) {
          let json = await response.json();
          console.log(json);
          console.log('element: ' + element)
          setEditFields(json, element)
        }
      }
      catch (error) {
        console.log("Oh nyo! " + error)
      }
    }

    let closeButtonEvent = (element) => {
    let closeButton = element.getElementsByClassName('close');
    closeButton[0].addEventListener('click', () => {
      element.style.visibility = 'hidden';
    })
  }

  function edit(id) {
    let editPopup = document.getElementById('editPopup');
    getJenis(id, editPopup);
  }
</script>