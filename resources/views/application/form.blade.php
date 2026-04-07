@extends('layouts.app')

@section('content')
    <h2>Заявка на практику / обращение</h2>

    @if(session('success'))
        <div style="padding:8px;background:#e6ffed;border:1px solid #b7f5c9;margin-bottom:12px">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div style="padding:8px;background:#fff4f4;border:1px solid #f5b7b7;margin-bottom:12px">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('application.submit') }}">
        @csrf
        <div style="margin-bottom:8px">
            <label>ФИО студента<br><input type="text" name="student_name" value="{{ old('student_name') }}" required style="width:100%"></label>
        </div>
        <div style="margin-bottom:8px">
            <label>Группа<br><input type="text" name="group" value="{{ old('group') }}" style="width:100%"></label>
        </div>
        <div style="margin-bottom:8px">
            <label>Организация<br><input type="text" name="organization" value="{{ old('organization') }}" style="width:100%"></label>
        </div>
        <div style="margin-bottom:8px">
            <label>Руководитель (от организации)<br><input type="text" name="supervisor" value="{{ old('supervisor') }}" style="width:100%"></label>
        </div>
        <div style="margin-bottom:8px">
            <label>Email<br><input type="email" name="email" value="{{ old('email') }}" style="width:100%"></label>
        </div>
        <div style="margin-bottom:8px">
            <label>Телефон<br><input type="text" name="phone" value="{{ old('phone') }}" style="width:100%"></label>
        </div>
        <div style="margin-bottom:8px">
            <label>Сообщение / Комментарий<br><textarea name="message" style="width:100%">{{ old('message') }}</textarea></label>
        </div>
        <div>
            <button type="submit">Отправить заявку</button>
        </div>
    </form>
@endsection
