@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <h1>Редактирование аккаунта</h1>
                    @if(session()->has('success'))
                        <div class="alert alert-success">Аккаунт успешно отредактирован!</div>
                    @endif
                <form method="POST" action="">
                    @csrf
                    <div class="mb-3">
                        <label for="InputFullName" class="form-label">ФИО:</label>
                        <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" id="InputFullName" placeholder="Фамилия Имя Отчество" aria-describedby="invalidInputFullName" value="{{ Auth::user()->fullname }}">
                        @error('fullname') <div id="invalidInputFullName" class="invalid-feedback">{{ $message }} </div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="InputAddress" class="form-label">Адрес:</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="InputAddress" placeholder="Пример: Москва, ул.Пушкина, д.Колотушкина" aria-describedby="invalidInputAddress" value="{{ Auth::user()->address }}">
                        @error('address') <div id="invalidInputAddress" class="invalid-feedback">{{ $message }} </div> @enderror
                    </div>
                    <p class="small">При не вводе пароля, изменения его не коснуться.</p>
                    <div class="mb-3">
                        <label for="InputPassword" class="form-label">Пароль:</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="InputPassword" placeholder="Пароль:" aria-describedby="invalidPasswordValidation">
                        @error('password') <div id="invalidPasswordValidation" class="invalid-feedback">{{ $message }} </div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="InputPasswordConfirmation" class="form-label">Повтор пароля:</label>
                        <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="InputPasswordConfirmation" placeholder="Повтор пароля:">
                    </div>
                    <button type="submit" class="btn btn-primary">Редактировать аккаунт</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
