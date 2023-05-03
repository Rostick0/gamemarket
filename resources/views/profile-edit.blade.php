<x-header :title="'Редактирование'" />
<main class="main">
    <section class="auth">
        <div class="container">
            <div class="auth__container">
                <h2 class="section-title auth__section-title">Редактирование</h2>
                <form class="auth__form" action="{{ route('profile_edit') }}" method="post">
                    @csrf
                    <label class="label">
                        <span title="Обязательное значение">Ваш ник*</span>
                        <input class="input" type="text" name="nickname"
                            value="{{ old('nickname') ?? $user->nickname }}" required>
                        @error('nickname')
                            <span class="_error">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="label">
                        <span title="Обязательное значение">E-mail*</span>
                        <input class="input" type="email" name="email" value="{{ old('email') ?? $user->email }}"
                            required>
                        @error('email')
                            <span class="_error">{{ $message }}</span>
                        @enderror
                    </label>
                    <label class="label">
                        <span title="Обязательное значение">Телефон*</span>
                        <input class="input" type="tel" name="telephone"
                            value="{{ old('nickname') ?? $user->telephone }}" required>
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
                    <button class="button auth__button">Изменить</button>
                </form>
                <div class="auth__bottom">
                    <form action="{{ route('profile_delete') }}" method="post">
                        @csrf
                        <button class="a _red">Удалить аккаунт</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<x-footer />
