<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Perspectivas</title>

    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">

</head>
<body>



<div id="items">

</div>

<script src="{{ elixir('js/generator.js') }}"></script>
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    generator.setItems({!! json_encode($items) !!});

</script>
</body>
</html>
