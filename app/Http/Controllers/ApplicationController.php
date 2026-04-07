<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationReceived;

class ApplicationController extends Controller
{
    public function showForm()
    {
        return view('application.form');
    }

    public function submit(Request $request)
    {
        $data = $request->validate([
            'student_name' => 'required|string|max:255',
            'group' => 'nullable|string|max:50',
            'organization' => 'nullable|string|max:255',
            'supervisor' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'message' => 'nullable|string',
        ]);

        $application = Application::create($data);

        // Отправляем письмо администратору (ADMIN_EMAIL в .env)
        try {
            $admin = env('ADMIN_EMAIL');
            if ($admin) {
                // ставим отправку в очередь, чтобы не блокировать ответ пользователя
                Mail::to($admin)->queue(new ApplicationReceived($application));
            }
        } catch (\Throwable $e) {
            report($e);
        }

        return redirect()->route('application.form')->with('success', 'Заявка успешно отправлена.');
    }
}
