<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>


    @if ($success) {{--    for no ajax case--}}
        <div class="limit-width card p-4 mt-4 bg-success text-white">
            Data successfully sent
        </div>
    @else
        <div class="limit-width card js-message p-4 mt-4"></div>

        <form class="limit-width js-form card p-4 mt-4" action="{{ route('form.submit') }}" method="POST">
            @csrf

            @if ($messages = $errors->getMessages())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($messages as $attribute => $message)
                            <li>{{ $message[0] ?? 'Error' }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <x-input type="text" label="Name" name="name" value="{{ old('name') }}" :errors="$errors" />
            <x-input type="text" label="Surname" name="surname" value="{{ old('surname') }}"/>
            <x-input type="email" label="Email" name="email" value="{{ old('email') }}"/>
            <x-input type="password" label="Password" name="password" value="{{ old('password') }}"/>
            <x-input type="password" label="Password confirm" name="password_confirmation"
                     value="{{ old('password_confirmation') }}"/>

            <button class="btn btn-success mt-4" type="submit">Submit</button>
        </form>
    @endif

</body>
</html>
