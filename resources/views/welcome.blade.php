<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <style>
            
            body{
                text-align: center;
                padding: 15%;
                background-color: #f7cd72;
            }
        </style>

        
    </head>
    <body>

            <h1> Welcome to Simple Resume (CV) Creator </h1>

        
        <div style="font-size: 35px;">
            @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a><br>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
         <br>
        <h3>Please login to view or edit your resume.  <br>
            If you have not registered yet then click on register and create your own CV</h3>


        </div>
    </body>
</html>
