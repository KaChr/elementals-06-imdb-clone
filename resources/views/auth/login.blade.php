@extends('layouts.app')

@section('content')
    <div class="columns is-marginless is-centered v-center">
        <div class="column is-5">
            <div class="card">
                <div class="card-content is-centered">
                    <div class="card__logo">
                        <img id="splash__logo" src="{{ asset('images/emdb_logo@1x.png') }}">
                    </div>
                    <form class="login-form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="field is-horizontal">
                            <div class="field-body">
                                <div class="field">
                                    <p class="control has-icons-left has-icons-right">
                                        <input class="input" id="email" type="email" name="email" placeholder="Email"
                                               value="{{ old('email') }}" required autofocus>
                                            <span class="icon is-small is-left">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <span class="icon is-small is-right">
                                                <i class="fa fa-check"></i>
                                            </span>
                                    </p>

                                    @if ($errors->has('email'))
                                        <p class="help is-danger">
                                            {{ $errors->first('email') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-body">
                                <div class="field">
                                    <p class="control has-icons-right">
                                        <input class="input" id="password" type="password" name="password" placeholder="Password" required>
                                        <span class="icon is-small is-left">
                                         <i class="fa fa-lock"></i>
                                        </span>
                                    </p>
                                    @if ($errors->has('password'))
                                        <p class="help is-danger">
                                            {{ $errors->first('password') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <label class="checkbox">
                                            <input type="checkbox"
                                                   name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-body">
                                <div class="field">
                                    <div class="control feature__login">
                                        <button type="submit" class="button button__login button--big button--solid-turquoise">Login</button>
                                    </div>
                                    <div class="control feature__login login__remember">
                                        <a href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
