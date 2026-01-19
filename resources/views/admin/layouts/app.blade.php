<!DOCTYPE html>
<html lang="en" dir="ltr">


@include('admin.layouts.common.head')
<body>

<div class="page-wrapper compact-wrapper" id="pageWrapper">
    @include('admin.layouts.common.header')

    <div class="page-body-wrapper">
        @include('admin.layouts.common.sidebar')

        @yield('content')

        <div class="container-fluid">
           @include('admin.layouts.common.fotoorcontent')
        </div>
    </div>

</div>

@include('admin.layouts.common.fotoor')


</body>

</html>
