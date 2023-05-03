<x-header :title="'Создание аккаунта'" />
<main class="main">
    <section class="auth">
        <div class="container">
            <div class="auth__container">
                <h2 class="section-title auth__section-title">Регистрация</h2>
                <form class="auth__form" action="{{ route('registration') }}" method="post">
                    @csrf
                    <label class="label">
                        <span title="Обязательное значение">Ваш ник*</span>
                        <input class="input" type="text" name="nickname" value="{{ old('nickname') }}" required>
                        @error('nickname')
                            <span class="_error">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="label">
                        <span title="Обязательное значение">E-mail*</span>
                        <input class="input" type="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="_error">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="label">
                        <span title="Обязательное значение">Телефон*</span>
                        <input class="input" type="tel" name="telephone" value="{{ old('telephone') }}" required>
                        @error('telephone')
                            <span class="_error">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="label">
                        <span title="Обязательное значение">Пароль*</span>
                        <input class="input" type="password" name="password" required>
                        @error('password')
                            <span class="_error">{{ $message }}</span>
                        @enderror
                    </label>
                    <button class="button auth__button">Создать</button>
                    <div class="auth__bottom">Есть аккаунт? - <a class="a auth__bottom_link"
                            href="{{ route('login') }}">Войти</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
<x-footer />
