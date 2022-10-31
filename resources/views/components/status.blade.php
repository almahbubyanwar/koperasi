@if (session('status'))
<div class="message">
  <p><b>{{session('status')['status']}}</b> {{session('status')['message']}}</p>
</div>
@endif

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