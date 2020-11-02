<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
 <!-- {{categories}} -->
 <div class="navbar-menu">
    <template >
      <!-- v-for="category in categories" -->
      <template>
         <!-- v-if="category.children.length" -->
        <div class="navbar-item is-hoverable has-dropdown" >
          <nuxt-link :to="{name:'index'}" class="navbar-link">
            <!-- :key="category.slug" -->
            <!-- {{category.name}} -->
            One
          </nuxt-link>
          <div class="navbar-dropdown">
            <nuxt-link  class="navbar-item">
              <!-- :to="{name:'categories-slug',params:{slug:child.slug}}" -->
               <!-- v-for="child in category.children" :key="child.slug" -->
              <!-- {{child.name}} -->
              three
            </nuxt-link>
          </div>
        </div>
      </template>
      <template >
        <!-- v-else -->
        <nuxt-link  class="navbar-item" >
          <!-- :to="{name:'categories-slug',params:{slug:category.slug}}" -->
          <!-- :key="category.slug" -->
            <!-- {{category.name}} -->
            two
        </nuxt-link>
      </template>
    </template>
  </div>




  <div class="section">
      <div class="container is-fluid">
          <div class="columns is-centered">
              <div class="column is-three-quarters">
                  <h1 class="title is-4">Your Cart</h1>
                  <article class="message">
                      Cart Overview
                  </article>
                  <a href="#" class="button is-fullwidth is-info is-medium">Checkout</a>
              </div>
          </div>
      </div>
  </div>
