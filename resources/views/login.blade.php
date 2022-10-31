<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/css/app.css')
  <title>Login</title>
</head>
<body id="login">
  <div id="loginpagecontainer" class="flex justify-center items-center min-w-[100vw]">
    <div class="box w-full max-w-[20rem]">
      <h1>Login</h1>
      <x-status />
      <form action="/login" method="POST">
        @csrf
        <div>
          <label for="name">Username</label>
          <input type="text" id="name" name="name" autofocus 
          placeholder="Masukkan username..."
          />
        </div>
        <div>
          <label for="password">Password</label>
          <input type="password" id="password" name="password" 
          placeholder="Masukkan password..." />
        </div>
        <button action="submit" class="bubsbutton">Login</button>
      </form>
    </div>
  </div>
</body>
</html>