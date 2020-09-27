<x-guest-layout>
    <main id="tt-pageContent" class="tt-offset-none">
        <div class="container">
            <div class="tt-loginpages-wrapper">
                <div class="tt-loginpages">
                    <a href="index.html" class="tt-block-title">
                        <img src="images/logo.png" alt="">
                        <div class="tt-title">
                            Welcome to Forum19
                        </div>
                        <div class="tt-description">
                            Join the forum to unlock true power of community.
                        </div>
                    </a>
                    <x-jet-validation-errors class="mb-4" />
                    <form class="form-default" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="loginUserName">Username</label>
                            <input type="text" name="name" class="form-control" id="loginUserName" placeholder="peektower" :value="old('name')" required autofocus autocomplete="name">
                        </div>
                        <div class="form-group">
                            <label for="loginUserEmail">Email</label>
                            <input type="email" name="email" class="form-control" id="loginUserEmail" placeholder="Sample@sample.com" :value="old('email')" required>
                        </div>
                        <div class="form-group">
                            <label for="loginUserPassword">Password</label>
                            <input type="password" name="password" class="form-control" id="loginUserPassword" placeholder="************" required autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            <label for="loginUserPasswordConfirmation">Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="loginUserPasswordConfirmation" placeholder="************" required autocomplete="new-password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary btn-block">Create my account</button>
                        </div>
                        <p>Already have an account? <a href="{{ route('login') }}" class="tt-underline">Login here</a></p>
                        <div class="tt-notes">
                            By signing up, signing in or continuing, I agree to
                            Selp’s <a href="#" class="tt-underline">Terms of Use</a> and <a href="#" class="tt-underline">Privacy Policy.</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-guest-layout>
