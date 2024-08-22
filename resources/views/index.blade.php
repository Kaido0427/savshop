<!doctype html>
<html lang="en" class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/favicon-32x32.webp') }}" type="image/webp" />
    <!-- CSS files -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <!-- Plugins -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/slick/slick-theme.css') }}" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dark-theme.css') }}" rel="stylesheet">
    <title>Savshop | Savplus Conseil</title>
</head>

<body>
    <!--page loader-->
    <div class="loader-wrapper">
        <div
            class="d-flex justify-content-center align-items-center position-absolute top-50 start-50 translate-middle">
            <div class="spinner-border text-dark" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    <!--end loader-->

    <!--start top header-->
    <header class="top-header">
        <nav class="navbar navbar-expand-xl w-100 navbar-dark container gap-3">
            <a class="navbar-brand d-none d-xl-inline" href="index.html"><img src="assets/images/logo.webp"
                    class="logo-img" alt=""></a>
            <a class="mobile-menu-btn d-inline d-xl-none" href="javascript:;" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar">
                <i class="bi bi-list"></i>
            </a>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
                <div class="offcanvas-header">
                    <div class="offcanvas-logo"><img src="assets/images/logo.webp" class="logo-img" alt="">
                    </div>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body primary-menu">
                    <ul class="navbar-nav justify-content-start flex-grow-1 gap-1">
                        <li class="nav-item">
                            <a class="nav-link" href="https://savplus.net">SAVPLUS CONSEIL</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                                data-bs-toggle="dropdown">
                                Catalogue
                            </a>
                            <div class="dropdown-menu dropdown-large-menu">
                                <div class="row">
                                    @foreach ($categories as $categorie)
                                        <div class="col-12 col-xl-4">
                                            <h6 class="large-menu-title">{{ $categorie->nom }}</h6>
                                            <ul class="list-unstyled">
                                                @foreach ($categorie->articles as $article)
                                                    <li><a href="#">{{ $article->nom_article }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- end row -->
                            </div>
                        </li>


                    </ul>
                </div>
            </div>
            <ul class="navbar-nav secondary-menu flex-row">
                <li class="nav-item">
                    <a class="nav-link dark-mode-icon" href="javascript:;">
                        <div class="mode-icon">
                            <i class="bi bi-moon"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="account-dashboard.html"><i class="bi bi-person-circle"></i></a>
                </li>
            </ul>
        </nav>
    </header>
    <!--end top header-->


    <!--start page content-->
    <div class="page-content">
        <!--start carousel-->
        <section class="slider-section">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active bg-primary">
                        <div class="row d-flex align-items-center">
                            <div class="col d-none d-lg-flex justify-content-center">
                                <div class="">
                                    <h3 class="h3 fw-light text-white fw-bold">New Arrival</h3>
                                    <h1 class="h1 text-white fw-bold">Women Fashion</h1>
                                    <p class="text-white fw-bold"><i>Last call for upto 25%</i></p>
                                    <div class=""><a class="btn btn-dark btn-ecomm" href="shop-grid.html">Shop
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <img src="assets/images/sliders/s_1.webp" class="img-fluid" alt="...">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!--end carousel-->
        <!--start tabular product-->
        <section class="product-tab-section section-padding bg-light">
            <div class="container">
                <div class="text-center pb-3">
                    <h3 class="mb-0 h3 fw-bold">Nos offres</h3>
                </div>
                <div class="row">
                    <div class="col-auto mx-auto">
                        <div class="product-tab-menu table-responsive">
                            <ul class="nav nav-pills flex-nowrap" id="pills-tab" role="tablist">
                                @foreach ($categories as $category)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link {{ $loop->first ? 'active' : '' }}"
                                            data-bs-toggle="pill" data-bs-target="#category-{{ $category->id }}"
                                            type="button">
                                            {{ $category->nom }}
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="tab-content tabular-product">
                    @foreach ($categories as $category)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                            id="category-{{ $category->id }}">
                            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-5 g-4">
                                @foreach ($category->articles as $article)
                                    <div class="col">
                                        <div class="card">
                                            <div class="position-relative overflow-hidden">
                                                <div
                                                    class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                                                    <a href="javascript:;"><i class="bi bi-heart"></i></a>
                                                    <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                                                    <a href="javascript:;" data-bs-toggle="modal"
                                                        data-bs-target="#QuickViewModal"><i
                                                            class="bi bi-zoom-in"></i></a>
                                                </div>
                                                <a href="#">
                                                    <img src="#" class="card-img-top" alt="...">
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <div class="product-info text-center">
                                                    <h6 class="mb-1 fw-bold product-name">{{ $article->nom_article }}
                                                    </h6>
                                                    <div class="ratings mb-1 h6">
                                                        <i class="bi bi-star-fill text-warning"></i>
                                                        <i class="bi bi-star-fill text-warning"></i>
                                                        <i class="bi bi-star-fill text-warning"></i>
                                                        <i class="bi bi-star-fill text-warning"></i>
                                                        <i class="bi bi-star-fill text-warning"></i>
                                                    </div>
                                                    <p class="mb-0 h6 fw-bold product-price">{{ $article->prix }} XOF/Mois</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    </div>
    <!--end page content-->
    <footer class="footer-strip text-center py-3 bg-section-2 border-top positon-absolute bottom-0">
        <p class="mb-0 text-muted">© 2024. savplus.net | Tout droits réservés.</p>
    </footer>
    <!--start quick view-->
    <!-- Modal -->
    <div class="modal fade" id="QuickViewModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content rounded-0">

                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12 col-xl-6">

                            <div class="wrap-modal-slider">

                                <div class="slider-for">
                                    <div>
                                        <img src="assets/images/product-images/01.jpg" alt=""
                                            class="img-fluid">
                                    </div>
                                    <div>
                                        <img src="assets/images/product-images/02.jpg" alt=""
                                            class="img-fluid">
                                    </div>
                                    <div>
                                        <img src="assets/images/product-images/03.jpg" alt=""
                                            class="img-fluid">
                                    </div>
                                    <div>
                                        <img src="assets/images/product-images/04.jpg" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>

                                <div class="slider-nav mt-3">
                                    <div>
                                        <img src="assets/images/product-images/01.jpg" alt=""
                                            class="img-fluid">
                                    </div>
                                    <div>
                                        <img src="assets/images/product-images/02.jpg" alt=""
                                            class="img-fluid">
                                    </div>
                                    <div>
                                        <img src="assets/images/product-images/03.jpg" alt=""
                                            class="img-fluid">
                                    </div>
                                    <div>
                                        <img src="assets/images/product-images/04.jpg" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-12 col-xl-6">
                            <div class="product-info">
                                <h4 class="product-title fw-bold mb-1">Check Pink Kurta</h4>
                                <p class="mb-0">Women Pink & Off-White Printed Kurta with Palazzos</p>
                                <div class="product-rating">
                                    <div class="hstack gap-2 border p-1 mt-3 width-content">
                                        <div><span class="rating-number">4.8</span><i
                                                class="bi bi-star-fill ms-1 text-success"></i></div>
                                        <div class="vr"></div>
                                        <div>162 Ratings</div>
                                    </div>
                                </div>
                                <hr>
                                <div class="product-price d-flex align-items-center gap-3">
                                    <div class="h4 fw-bold">$458</div>
                                    <div class="h5 fw-light text-muted text-decoration-line-through">$2089</div>
                                    <div class="h4 fw-bold text-danger">(70% off)</div>
                                </div>
                                <p class="fw-bold mb-0 mt-1 text-success">inclusive of all taxes</p>

                                <div class="more-colors mt-3">
                                    <h6 class="fw-bold mb-3">More Colors</h6>
                                    <div class="d-flex align-items-center gap-2 flex-wrap">
                                        <div class="color-box bg-red"></div>
                                        <div class="color-box bg-primary"></div>
                                        <div class="color-box bg-yellow"></div>
                                        <div class="color-box bg-purple"></div>
                                        <div class="color-box bg-green"></div>
                                    </div>
                                </div>

                                <div class="size-chart mt-3">
                                    <h6 class="fw-bold mb-3">Select Size</h6>
                                    <div class="d-flex align-items-center gap-2 flex-wrap">
                                        <div class="">
                                            <button type="button" class="rounded-0">XS</button>
                                        </div>
                                        <div class="">
                                            <button type="button" class="rounded-0">S</button>
                                        </div>
                                        <div class="">
                                            <button type="button" class="rounded-0">M</button>
                                        </div>
                                        <div class="">
                                            <button type="button" class="rounded-0">L</button>
                                        </div>
                                        <div class="">
                                            <button type="button" class="rounded-0">XL</button>
                                        </div>
                                        <div class="">
                                            <button type="button" class="rounded-0">XXL</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="cart-buttons mt-3">
                                    <div class="buttons d-flex flex-column gap-3 mt-4">
                                        <a href="javascript:;"
                                            class="btn btn-lg btn-dark btn-ecomm px-5 py-3 flex-grow-1"><i
                                                class="bi bi-basket2 me-2"></i>Add to Bag</a>
                                        <a href="javascript:;"
                                            class="btn btn-lg btn-outline-dark btn-ecomm px-5 py-3"><i
                                                class="bi bi-suit-heart me-2"></i>Wishlist</a>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="product-share">
                                    <h6 class="fw-bold mb-3">Share This Product</h6>
                                    <div class="d-flex align-items-center gap-2 flex-wrap">
                                        <div class="">
                                            <button type="button" class="btn-social bg-twitter"><i
                                                    class="bi bi-twitter"></i></button>
                                        </div>
                                        <div class="">
                                            <button type="button" class="btn-social bg-facebook"><i
                                                    class="bi bi-facebook"></i></button>
                                        </div>
                                        <div class="">
                                            <button type="button" class="btn-social bg-linkden"><i
                                                    class="bi bi-linkedin"></i></button>
                                        </div>
                                        <div class="">
                                            <button type="button" class="btn-social bg-youtube"><i
                                                    class="bi bi-youtube"></i></button>
                                        </div>
                                        <div class="">
                                            <button type="button" class="btn-social bg-pinterest"><i
                                                    class="bi bi-pinterest"></i></button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>

            </div>
        </div>
    </div>
    <!--end quick view-->
    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><i class="bi bi-arrow-up"></i></a>
    <!--End Back To Top Button-->

    <!-- JavaScript files -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/index.js') }}"></script>
    <script src="{{ asset('assets/js/loader.js') }}"></script>
</body>

</html>
