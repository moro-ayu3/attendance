<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Attendance</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  @yield('css')
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <div class="header-utilities">
        <h3 class="header__logo">
          Atte
        </h3>
      </div>
    </div>
  </header>

  <main>
    @yield('content')
  </main>

  <fooder>
    <div class="copy-right">
      <small class="copy_right">Atte,inc.</small>
    </div>
  </footer>
</body>

</html>