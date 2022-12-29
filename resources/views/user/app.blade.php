<!DOCTYPE html>
<html lang="en">

    @include('user.layouts.head')

    <body>
        <div class="body-inner">

            @include('user.layouts.header')

            @yield('content')
            

            @include('user.layouts.footer')

            @include('user.layouts.scripts')

        </div>
        @livewireScripts
    </body>
</html>