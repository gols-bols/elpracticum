@extends('layouts.app')

@section('content')
    <h2>Заявки</h2>

    <table style="width:100%;border-collapse:collapse">
        <thead>
            <tr>
                <th style="text-align:left;padding:8px;border-bottom:1px solid #ddd">ID</th>
                <th style="text-align:left;padding:8px;border-bottom:1px solid #ddd">ФИО</th>
                <th style="text-align:left;padding:8px;border-bottom:1px solid #ddd">Группа</th>
                <th style="text-align:left;padding:8px;border-bottom:1px solid #ddd">Email</th>
                <th style="text-align:left;padding:8px;border-bottom:1px solid #ddd">Дата</th>
                <th style="text-align:left;padding:8px;border-bottom:1px solid #ddd">Действие</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $it)
                <tr>
                    <td style="padding:8px;border-bottom:1px solid #eee">{{ $it->id }}</td>
                    <td style="padding:8px;border-bottom:1px solid #eee">{{ $it->student_name }}</td>
                    <td style="padding:8px;border-bottom:1px solid #eee">{{ $it->group }}</td>
                    <td style="padding:8px;border-bottom:1px solid #eee">{{ $it->email }}</td>
                    <td style="padding:8px;border-bottom:1px solid #eee">{{ $it->created_at }}</td>
                    <td style="padding:8px;border-bottom:1px solid #eee"><a href="{{ url('/admin/applications/'.$it->id) }}">Открыть</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top:12px">{{ $items->links() }}</div>
@endsection
