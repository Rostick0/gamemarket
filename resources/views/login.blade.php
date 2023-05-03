<x-header :title="'Вход в аккаунт'" />
<main class="main">
    <section class="auth">
        <div class="container">
            <div class="auth__container">
                <h2 class="section-title auth__section-title">Вход</h2>
                <form class="auth__form" action="{{ route('login') }}" method="post">
                    @csrf
                    <label class="label">
                        <span>Ваш ник</span>
                        <input class="input" type="text" name="nickname" value="{{ old('nickname') }}" required>
                        @error('nickname')
                            <span class="_error">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="label">
                        <span>Пароль</span>
                        <input class="input" type="password" name="password" required>
                        @error('password')
                            <span class="_error">{{ $message }}</span>
                        @enderror
                    </label>
                    <button class="button auth__button">Войти</button>
                    <div class="auth__bottom">Если у вас нет аккаунта - <a class="a auth__bottom_link"
                            href="{{ route('registration') }}">Создать</a></div>
                </form>
            </div>
        </div>
    </section>
</main>
<x-footer />
