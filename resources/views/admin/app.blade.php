<!DOCTYPE html>
<html lang="en">


    @include('admin.layouts.head')

    <body>

        <div class="container-scroller">

            @include('admin.layouts.sidebar')

            <div class="container-fluid page-body-wrapper">

                @include('admin.layouts.navbar')
                

                <div class="main-panel">

                    <div class="content-wrapper">
                        @include('admin.layouts.breadcrumb')

                        @yield('content')

                    </div>

                    @include('admin.layouts.footer')

                </div>

            </div>

        </div>

        @include('admin.layouts.scripts')

    </body>

</html>