
<!DOCTYPE html>
<html lang="en">
<head>
</head>
	@include('layout.head')
<body>
	<div class="layout.site">
        <!-- header -->
       @include('layout.header2')
        <!-- main -->
        <div class="content">
            @yield('content')
        </div>

        <!-- footer -->
        @include('layout.footer')
    </div>

    @include('layout.foot')
</body>
</html>