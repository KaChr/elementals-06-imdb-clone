<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('includes.head')

<body>
@include('includes.headertemp')

<!-- SIGN UP FORM -->

<section class="section">
    <div class="columns">
        <div class="column is-4">
            <form class="register-form" method="POST" action="{{ route('register') }}">

                {{ csrf_field() }}

                    <!-- Placeholder for user profile picture -->
                    <div class="upload__photo">
                        <div class="user__avatar">
                            <img src="https://image.tmdb.org/t/p/w1280/bOlYWhVuOiU6azC4Bw6zlXZ5QTC.jpg" alt="useravatar">
                        </div>
                        <!-- Add upload picture if there is time 
                            Upload picture 
                        <div class="file is-medium is-centered">
                          <label class="file-label">
                            <input class="file-input" type="file" name="picture">
                            <span class="file-cta">
                              <span class="file-icon">
                                <i class="fa fa-upload"></i>
                              </span>
                              <span class="file-label">
                                Upload picture
                              </span>
                            </span>
                          </label>
                        </div>
                    </div> -->

                    <!-- Name -->
                    <div class="field">
                        <p class="control">
                            <input class="input" id="name" type="name" placeholder="Name" name="name" value="{{ old('name') }}"
                                    required autofocus>
                        </p>
                            @if ($errors->has('name'))
                                <p class="help is-danger">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                    </div>


                    <!-- Email -->
                    <div class="field">
                        <p class="control">
                            <input class="input" id="email" type="email" placeholder="Email" name="email"
                                    value="{{ old('email') }}" required autofocus>
                        </p>
                            @if ($errors->has('email')) 
                                <p class="help is-danger">
                                    {{ $errors->first('email') }}
                            
                                </p>
                            @endif
                    </div> 

                    <!-- Password -->
                    <div class="field">
                        <p class="control">
                            <input class="input" id="password" type="password" placeholder="Password" name="password" required>
                        </p>   
                            @if ($errors->has('password'))
                                <p class="help is-danger">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif 
                    </div>

                    <!-- Confirm password -->
                    <div class="field">
                        <p class="control">
                            <input class="input" id="password-confirm" type="password" placeholder="Confirm password"
                                               name="password_confirmation" required>
                        </p>    
                            @if ($errors->has('password'))
                                <p class="help is-danger">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif
                    </div>

                    <!-- Sign up/Cancel buttons -->
                    <div class="container has-text-centered">
                        <button class="button button--big button--solid-yellow">CANCEL</button>
                        <button class="button button--big button--solid-turquoise" type="submit">SIGN UP</button>
                    </div>
            </form>
        </div>
    </div>
</section>

@include('includes.footer')
</body>
</html>
                