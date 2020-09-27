<x-guest-layout>
    <main id="tt-pageContent" class="tt-offset-none">
        <div class="container">
            <div class="tt-loginpages-wrapper">
                <div class="tt-loginpages">
                    <a href="index.html" class="tt-block-title">
                        <img src="images/logo.png" alt="">
                        <div class="tt-title">
                            Welcome to Selp
                        </div>
                        <div class="tt-description">
                            Log into your account to unlock true power of community.
                        </div>
                    </a>
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    <x-jet-validation-errors class="mb-4" />
                    <form class="form-default" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="loginUserName">Email</label>
                            <input type="email" name="email" class="form-control" id="loginUserName" placeholder="peektower" :value="old('email')" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="loginUserPassword">Password</label>
                            <input type="password" name="password" class="form-control" id="loginUserPassword" placeholder="************" required autocomplete="current-password">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div class="checkbox-group">
                                        <input type="checkbox" id="settingsCheckBox01" name="remember">
                                        <label for="settingsCheckBox01">
                                            <span class="check"></span>
                                            <span class="box"></span>
                                            <span class="tt-text">Remember me</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col ml-auto text-right">
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="tt-underline">Forgot Password</a>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary btn-block">Log in</button>
                        </div>

                        <p>Don’t have an account? <a href="/register" class="tt-underline">Signup here</a></p>
                        <div class="tt-notes">
                            By Logging in, signing in or continuing, I agree to
                            Selp's <a href="#" class="tt-underline">Terms of Use</a> and <a href="#" class="tt-underline">Privacy Policy.</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-guest-layout>
