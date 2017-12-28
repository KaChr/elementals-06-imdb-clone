<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('includes.head')

    <style>
        .upload__photo {
            text-align: center !important;
            margin-bottom: 3rem;
        }

        .person__avatar {
            display: block !important;
            margin-left: auto;
            margin-right: auto;
            height: 200px !important;
            width: 200px !important;
        }

    </style>
<body>
@include('includes.headertemp')

<!-- SIGN UP FORM -->

<section class="section">
<div class="columns">
    <div class="column is-4">

        <!-- Upload photo -->
        <div class="upload__photo">
            <div class="person__avatar">
                <img src="https://image.tmdb.org/t/p/w1280/bOlYWhVuOiU6azC4Bw6zlXZ5QTC.jpg" alt="avatar">
            </div>
            <p>Upload photo</p>
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
    </div>
</div>
</section>

@include('includes.footer')
</body>
</html>