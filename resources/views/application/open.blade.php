@extends('layouts.app')

@section('content')
    <h2>Запрос на сотрудничество / заявка</h2>
    <p>Современная и простая форма для связи с колледжем — заполните поля и мы свяжемся с вами.</p>

    @if(session('success'))
        <div style="padding:10px;background:#e6ffed;border:1px solid #b7f5c9;margin-bottom:12px">{{ session('success') }}</div>
    @endif

    <form method="post" action="{{ route('application.submit') }}" style="max-width:720px">
        @csrf
        <div style="display:flex;gap:8px;margin-bottom:8px">
            <input name="student_name" placeholder="ФИО студента" value="{{ old('student_name') }}" required style="flex:2;padding:8px">
            <input name="group" placeholder="Группа" value="{{ old('group') }}" style="flex:1;padding:8px">
        </div>
        <div style="display:flex;gap:8px;margin-bottom:8px">
            <input name="organization" placeholder="Организация" value="{{ old('organization') }}" style="flex:1;padding:8px">
            <input name="supervisor" placeholder="Руководитель (от организации)" value="{{ old('supervisor') }}" style="flex:1;padding:8px">
        </div>
        <div style="display:flex;gap:8px;margin-bottom:8px">
            <input name="email" placeholder="Email" value="{{ old('email') }}" style="flex:1;padding:8px">
            <input name="phone" placeholder="Телефон" value="{{ old('phone') }}" style="flex:1;padding:8px">
        </div>
        <div style="margin-bottom:8px">
            <textarea name="message" placeholder="Сообщение" style="width:100%;padding:8px;min-height:120px">{{ old('message') }}</textarea>
        </div>
        <div>
            <button type="submit" style="background:#1f6feb;color:#fff;padding:10px 14px;border:none;border-radius:6px">Отправить</button>
        </div>
    </form>

    <p style="margin-top:18px;color:#666">Эта форма заменяет устаревший интерфейс — сохраняется суть полей, но оформление и UX обновлены.</p>
@endsection