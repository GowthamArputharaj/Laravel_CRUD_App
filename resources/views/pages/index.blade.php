@extends('layouts.app')

@section('content')
    <div class="well text-center">
        <h1>Welcome To Laravel!</h1>
        <p>This is the laravel application from the "Laravel From Scratch" YouTube series</p>
        @guest
            <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
        @endguest
    </div>

    <script type="text/javascript">

        console.log('               ________                   __   .__                       '); 
        console.log('              /  _____/   ____ __  _  ___/  |_ |  |__  _____     _____   ');
        console.log('             /   \\  ___  /  _ \\\\ \\/ \\/ /\\   __\\|  |  \\ \\__  \\   /     \\  ');
        console.log('             \\    \\_\\  \\(  <_> )\\     /  |  |  |   Y  \\ / __ \\_|  Y Y  \\ ');
        console.log('              \\______  / \\____/  \\/\\_/   |__|  |___|  /(____  /|__|_|  / ');
        console.log('                     \\/                             \\/      \\/       \\/  ');

    </script>
@endsection
