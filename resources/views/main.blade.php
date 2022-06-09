<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Example Megafon</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-screen-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="block font-medium text-sm text-gray-700 p-5">
                <p class="font-bold text-4xl">Задача:</p><br>
                <p>
                    Средствами TailwindCSS (для вёрстки CSS), Vue 3 (frontend) и Laravel (backend) реализовать небольшое SPA приложение для заметок по спискам задач.<br>
                    <br>
                    Каждая задача имеет:<br>
                    ·      Исполнителя<br>
                    ·      Описание<br>
                    ·      Срок выполнения<br>
                    <br>
                    При добавлении новой задачи, приложение должно отправить запрос в backend где задача должна сохраниться в БД, и так же вывести задачу в списке задач без перезагрузки страницы. При обновлении страницы данные по задачам должны браться с БД.<br>
                    <br>
                    Требование к функционалу:<br>
                    ·      Добавление/редактирование/удаление задачи<br>
                    ·      Отметить задачу как выполненная<br>
                    ·      Сортировка задач по срокам реализации и по имени исполнителя<br>
                    <br>
                    Все действия на сайте должны происходить без перезагрузки страницы
                </p>
            </div>
            <hr>
            <div class="w-full text-center p-10 text-3xl">
                @if (Route::has('login'))
                    <div>
                        @auth
                            <a href="{{ url('/task') }}">Доска задач</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">| Regis</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </div>
    </body>
</html>
