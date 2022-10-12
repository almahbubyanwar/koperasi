<x-popup>
    <h1>Input</h1>
    <form action="{{ route('user.store') }}" method="POST">
    @csrf
        <div>
            <label for="name">Nama</label>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>
        <div>
            <label for="level">Level</label>
            <input type="text" id="level" name="level">
        </div>
        <button type="submit" class="bubsbutton">Submit</button>
    </form>
</x-popup>