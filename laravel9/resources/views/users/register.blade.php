@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-10">
                <h1>Регистрация нового пользователя</h1>
                @auth
                    <div class="alert alert-primary">Вы уже авторизованы. Регистрация не возможна!</div>
                @endauth
                @guest()
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="InputEmail" class="form-label">Электронная почта:</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="InputEmail" aria-describedby="invalidEmailFeedback" value="{{ old('email') }}">
                            @error('email')<div id="invalidEmailFeedback" class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="InputLogin" class="form-label">Логин:</label>
                            <input type="text" name="login" class="form-control @error('login') is-invalid @enderror" id="InputLogin" aria-describedby="invalidLoginFeedback" value="{{ old('login') }}">
                            @error('login')<div id="invalidLoginFeedback" class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="InputFullname" class="form-label">Ваше ФИО:</label>
                            <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" id="InputFullname" aria-describedby="invalidFullnameFeedback"
                                   value="{{ old('fullname') }}">
                            @error('fullname')<div id="invalidFullnameFeedback" class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="InputAddress" class="form-label">Ваш Адрес:</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="InputAddress" aria-describedby="invalidAddressFeedback" value="{{ old('address') }}">
                            @error('address')<div id="invalidAddressFeedback" class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="InputPassword" class="form-label">Пароль:</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="InputPassword" aria-describedby="invalidPasswordFeedback">
                            @error('password')<div id="invalidPasswordFeedback" class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="InputPasswordConfirmation" class="form-label">Повтор пароля:</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="InputPasswordConfirmation" aria-describedby="invalidPasswordConfirmationFeedback">
                            @error('password')<div id="invalidPasswordConfirmationFeedback" class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Регистрация</button>
                    </form>
                @endguest
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
