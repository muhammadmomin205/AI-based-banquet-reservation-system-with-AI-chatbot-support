    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade"
        style="background-image: url({{ asset('customer/img/page_title/page_title1\.jpg') }});">
        <div class="container position-relative">
            <h1>{{ $pageTitle ?? 'BanquetHub' }}</h1>
            <p>This web application centralizes all banquet halls in Hyderabad, allowing users to explore, compare, and
                book venues easily.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('customer') }}">Home</a></li>
                    <li class="current">{{ $pageTitle ?? 'BanquetHub' }}</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->
