<h1>Новая заявка на практику</h1>
<p>Поступила новая заявка с сайта:</p>
<ul>
    <li><strong>ФИО:</strong> {{ $application->student_name }}</li>
    <li><strong>Группа:</strong> {{ $application->group }}</li>
    <li><strong>Организация:</strong> {{ $application->organization }}</li>
    <li><strong>Руководитель:</strong> {{ $application->supervisor }}</li>
    <li><strong>Email:</strong> {{ $application->email }}</li>
    <li><strong>Телефон:</strong> {{ $application->phone }}</li>
</ul>
<p><strong>Сообщение:</strong></p>
<p>{{ $application->message }}</p>
<p>Дата: {{ $application->created_at }}</p>
