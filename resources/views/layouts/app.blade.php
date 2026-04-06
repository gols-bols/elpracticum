<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $page->meta_title ?? 'Сайт организации' }}</title>
    <meta name="description" content="{{ $page->meta_description ?? '' }}">
    <style>
        body{font-family:Arial,Helvetica,sans-serif;max-width:900px;margin:24px auto;color:#222}
        header{border-bottom:1px solid #eee;padding-bottom:12px;margin-bottom:18px}
        footer{border-top:1px solid #eee;padding-top:12px;margin-top:24px;color:#666;font-size:0.9em}
    </style>
</head>
<body>
<header>
    <h1>{{ $page->title ?? 'Организация' }}</h1>
</header>
<main>
    @yield('content')
</main>
<footer>
    <div>ГБПОУ МО Сергиево-Посадский колледж</div>
</footer>
</body>
</html>