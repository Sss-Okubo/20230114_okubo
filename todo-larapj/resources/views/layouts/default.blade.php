<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <style>
    body {
      background-color:#330099;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    h1 {
      font-size:2em;
      
    }

    .content {
      width:50em;
      background:white;
      border-radius: 10px;
      padding-top:1em;
      padding-left:2.5em; 
    }
  </style>
</head>
<body>
  <div class="content">
    <h1>@yield('title')</h1>
    @yield('content')
  </div>
</body>
</html>