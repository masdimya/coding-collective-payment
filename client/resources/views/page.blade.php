<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard Transction</title>
  <link href="/style.css" rel="stylesheet">
  @livewireStyles
</head>
<body class="mx-20">
  <div class="container">
    @livewire('balance')
    @livewire('form')
    @livewire('transaction-table')
  </div>
  @livewireScripts
</body>
</html>