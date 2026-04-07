@extends('layouts.app')

@section('content')
    <h2>Заявка #{{ $item->id }}</h2>

    <div><strong>ФИО:</strong> {{ $item->student_name }}</div>
    <div><strong>Группа:</strong> {{ $item->group }}</div>
    <div><strong>Организация:</strong> {{ $item->organization }}</div>
    <div><strong>Руководитель:</strong> {{ $item->supervisor }}</div>
    <div><strong>Email:</strong> {{ $item->email }}</div>
    <div><strong>Телефон:</strong> {{ $item->phone }}</div>
    <div style="margin-top:12px"><strong>Сообщение:</strong><div style="padding:8px;border:1px solid #eee">{{ $item->message }}</div></div>
    <div style="margin-top:12px"><strong>Статус:</strong> {{ $item->status }}</div>
    <div style="margin-top:12px"><a href="{{ url('/admin/applications') }}">← назад</a></div>
@endsection
