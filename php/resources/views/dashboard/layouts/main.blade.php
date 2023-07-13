<!DOCTYPE html>
<html lang="en">

@include('dashboard.includes.head')

<body>
    @include('dashboard.includes.header')
    <!-- ======= Sidebar ======= -->
    @include('dashboard.includes.side_nav')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            @yield('content')
        </section>

    </main><!-- End #main -->

    @include('dashboard.includes.footer')

</body>

</html>
