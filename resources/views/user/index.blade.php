<x-user.add-popup domId="addPopup" />
<x-user.edit-popup domId="editPopup" />
<x-layout>
  <main>
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
    

    <div class="head">
      <h1>User Table</h1>
      <button id="addButton" class="bubsbutton">Tambah</button>
    </div>
    @if (count($users) > 0)
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Level</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <td>{{$user->userId}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->level}}</td>
          <td><button class="bubsbutton" onclick="edit({{$user->userId}})">Edit</button>
            <form method="POST" action={{route('user.destroy', $user->userId)}} style="display: inline-block;">
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
    getUserData(noAnggota, editPopup);
  }

  const setEditFields = function(json) {
    console.log(json);
    document.getElementById('id').value = json.userId;
    document.getElementById('nameEdit').value = json.name;
    document.getElementById('levelEdit').value = json.level;
  }

  const getUserData = async function(id, editPopup) {
    try {
      const rootUrl = "{{ URL::to('/') }}";
      const path = `/api/user/getData/${id}`;

      const url = rootUrl + path;
      
      let response = await fetch(url);
      if (response.ok) {
        let json = await response.json();
        setEditFields(json);
        showElement(editPopup);
      }
    }
    catch (error) {
      console.log('Oh nyo! ' + error);
    }
  }

</script>