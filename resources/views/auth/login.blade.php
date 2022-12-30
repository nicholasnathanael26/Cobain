<link rel="stylesheet" type="text/css" href="{{ asset('css/logreg.css') }}"/>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form method="POST" action="{{ route('register') }}">
                <h1>Create Account</h1>
                @csrf
                <span>or use your email for registration</span>
                <input type="text" placeholder="Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ message }}</strong>
                    </span>
                @enderror
                <input type="email" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email"/>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="password" placeholder="Password" name="password" required autocomplete="new-password"/>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ message }}</strong>
                    </span>
                @enderror
                <input type="password" placeholder="retype-password" name="password_confirmation" required autocomplete="new-password">
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form method='POST' action="{{ route('login') }}">
                @csrf

                <h1>Sign in</h1>
                <span>or use your account</span>
                <input type="email" name="email" placeholder="Email" values="{{ old('email') }}" required autocomplete="email" autofocus/>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input type="password" name="password" placeholder="Password" required autocomplete="current-password"/>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Forgot your password?</a>
                @endif
                <button type="submit">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back Co'BaVers!</h1>
                    <p>To keep eat with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Co'BaVers</h1>
                    <p>Enter your personal details and start eat with us!</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('js/logreg.js') }}"></script>
