@extends('layouts.app')

@section('content')
    <article>
        {!! $page->content ?? '<p>Контент временно отсутствует.</p>' !!}
    </article>
@endsection