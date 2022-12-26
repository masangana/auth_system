<!DOCTYPE html>
<html lang="en">

    @include('user.layouts.head')

    <body>

        @include('user.layouts.topbar')

        @include('user.layouts.mobilemenu')

        @include('user.layouts.header')

        @yield('content')
        

        @include('user.layouts.footer')

        @include('user.layouts.scripts')

    </body>
</html>