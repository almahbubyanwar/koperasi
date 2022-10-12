<x-popup>
    <h1>Edit</h1>
    <form action="{{ route('user.update', 0) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" id="id" name="id">
        <div>
            <label for="name">Nama</label>
            <input type="text" id="nameEdit" name="name">
        </div>
        <div>
            <label for="password">Password Lama</label>
            <input type="password" id="oldPasswordEdit" name="oldPassword">
        </div>
        <div>
            <label for="password">Password Baru</label>
            <input type="password" id="newPasswordEdit" name="newPassword">
        </div>
        <div>
            <label for="level">Level</label>
            <input type="text" id="levelEdit" name="level">
        </div>
        <button type="submit" class="bubsbutton">Submit</button>
    </form>
</x-popup>
