<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('includes.head')

<body>
@include('includes.headertemp')

<!-- SIGN UP FORM -->

<section class="section">
    <div class="columns">
        <div class="column is-4">

            <!-- Placeholder for user profile picture -->
            <div class="upload__photo">
                <div class="user__avatar">
                    <img src="https://image.tmdb.org/t/p/w1280/bOlYWhVuOiU6azC4Bw6zlXZ5QTC.jpg" alt="useravatar">
                </div>
                <!-- Upload picture -->
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
            </div>

            <!-- First name -->
            <div class="field">
              <div class="control">
                <input class="input" type="text" placeholder="First name">
              </div>
            </div>

            <!-- Surname -->
            <div class="field">
              <div class="control">
                <input class="input" type="text" placeholder="Surname">
              </div>
            </div>

            <!-- Username -->
            <div class="field">
                <p class="control has-icons-left has-icons-right">
                  <input class="input is-success" type="text" placeholder="Username">
                  <span class="icon is-small is-left">
                    <i class="fa fa-user"></i>
                  </span>
                  <span class="icon is-small is-right">
                    <i class="fa fa-check"></i>
                  </span>
                </p>
                <p class="help is-success">This username is available</p>
            </div>

            <!-- Email -->
            <div class="field">
                <p class="control has-icons-left has-icons-right">
                    <input class="input" type="email" placeholder="Email">
                    <span class="icon is-small is-left">
                    <i class="fa fa-envelope"></i>
                    </span>
                    <span class="icon is-small is-right">
                    <i class="fa fa-check"></i>
                    </span>
                </p>
            </div>

            <!-- Password -->
            <div class="field">
                <p class="control has-icons-left has-icons-right">
                    <input class="input" type="password" placeholder="Password">
                    <span class="icon is-small is-left">
                    <i class="fa fa-lock"></i>
                    </span>
                    <span class="icon is-small is-right">
                    <i class="fa fa-check"></i>
                    </span>
                </p>
            </div>

            <!-- Sign up/Cancel buttons -->
            <div class="container has-text-centered">
                <button class="button button--big button--solid-yellow">CANCEL</button>
                <button class="button button--big button--solid-turquoise">SIGN UP</button>
            </div>
            
        </div>
    </div>
</section>

@include('includes.footer')
</body>
</html>