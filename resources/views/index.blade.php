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
            <a class="navbar-brand d-none d-xl-inline" href="index.html"><img src="{{ asset('image/logo_sav.png') }}"
                    class="logo-img" alt=""></a>
            <a class="mobile-menu-btn d-inline d-xl-none" href="javascript:;" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar">
                <i class="bi bi-list"></i>
            </a>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
                <div class="offcanvas-header">
                    <div class="offcanvas-logo"> <a href="https://savplus.net"><img src="{{ asset('image/logo_sav.png') }}"
                                class="logo-img" alt=""> </a>
                    </div>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body primary-menu">
                    <ul class="navbar-nav justify-content-start flex-grow-1 gap-1">

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
              {{-- <li class="nav-item">
                    <a class="nav-link" href="account-dashboard.html"><i class="bi bi-person-circle"></i></a>
                </li>--}}
            </ul>
        </nav>
    </header>
    <!--end top header-->

    <!--start page content-->
    <div class="page-content">
        <!--start carousel-->
        <section class="slider-section">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" style="background-color:#6d74c2;">
                        <div class="row d-flex align-items-center">
                            <div class="col-12 col-lg-6 text-center text-lg-start">
                                <div class="carousel-content">
                                    <h3 class="h3 fw-light text-white fw-bold">TOUTES NOS OFFRES A PORTEE DE MAIN</h3>
                                    <h1 class="h1 text-white fw-bold"></h1>
                                    <p class="text-white fw-bold"><i></i></p>
                                    <div class=""><a class="btn btn-dark btn-ecomm" href="#catalogue">VOIR LE
                                            CATALOGUE !</a></div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <img src="{{ asset('image/hero.jpg') }}" class="img-fluid" alt="..."
                                    height="550" width="550">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="background-color: #FF0000;">
                        <div class="row d-flex align-items-center">
                            <div class="col-12 col-lg-6 text-center text-lg-start">
                                <div class="carousel-content">
                                    <h3 class="h3 fw-light text-white fw-bold">OFFRE SPECIALE!</h3>
                                    <h1 class="h1 text-white fw-bold">35.000 XOF</h1>

                                    <div class=""><a class="btn btn-dark btn-ecomm"
                                            href="#">Souscrire maintenant !</a></div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <img src="{{ asset('image/deal.jpg') }}" class="img-fluid" alt="..."
                                    height="550" width="550">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        <style>
            .carousel-item {
                min-height: 300px;
            }

            .carousel-item .row {
                position: relative;
            }

            .carousel-content {
                padding: 20px;
            }

            @media (max-width: 991px) {
                .carousel-item .row {
                    flex-direction: column-reverse;
                }

                .carousel-content {
                    position: absolute;
                    top: 0;
                    left: 0;
                    right: 0;
                    background-color: rgba(0, 0, 0, 0.5);
                    color: white;
                    z-index: 2;
                }

                .carousel-item .col-12:last-child {
                    position: absolute;
                    top: 0;
                    left: 0;
                    right: 0;
                    bottom: 0;
                    z-index: 1;
                }

                .carousel-item .col-12:last-child img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }

                /* Réduction de la taille du texte sur mobile */
                .carousel-content h3 {
                    font-size: 1.2rem;
                }

                .carousel-content h1 {
                    font-size: 1.8rem;
                }

                .carousel-content p {
                    font-size: 0.9rem;
                }

                .carousel-content .btn {
                    font-size: 0.8rem;
                    padding: 0.5rem 1rem;
                }
            }

            @media (min-width: 992px) {
                .carousel-item .row {
                    min-height: 400px;
                }
            }
        </style>
        <!--end carousel-->
        <!--start tabular product-->
        <section class="product-tab-section section-padding bg-light">
            <div class="container">
                <div class="text-center pb-3">
                    <h3 class="mb-0 h3 fw-bold">NOS OFFRES</h3>
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
                                                    <a href="javascript:;" data-bs-toggle="modal"
                                                        data-bs-target="#QuickViewModal"
                                                        data-title="{{ $article->nom_article }}"
                                                        data-description="{{ $article->description }}"
                                                        data-price="{{ $article->prix }}"
                                                        data-image="{{ asset($article->offre_url) }}">
                                                        <i class="bi bi-zoom-in"></i>
                                                    </a>
                                                </div>

                                                <a href="#">
                                                    <img src="{{ asset($article->offre_url) }}" class="card-img-top"
                                                        alt="...">
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <div class="product-info text-center">
                                                    <h6 class="mb-1 fw-bold product-name">{{ $article->nom_article }}
                                                    </h6>

                                                    <p class="mb-0 h6 fw-bold product-price">{{ $article->prix }}
                                                        XOF/Mois</p>
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
                                        <img src="{{ asset('assets/images/product-images/01.jpg') }}" alt=""
                                            class="img-fluid">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-6">
                            <div class="product-info">
                                <h4 class="product-title fw-bold mb-1"></h4>
                                <p class="mb-0"></p>
                                <hr>
                                <div class="product-price d-flex align-items-center gap-3">
                                    <div class="h4 fw-bold"></div>
                                </div>

                                <div class="cart-buttons mt-3">
                                    <div class="buttons d-flex flex-column gap-3 mt-4">
                                        <input type="number" min="1"
                                            class="btn btn-lg btn-dark btn-ecomm px-5 py-3 flex-grow-1"
                                            placeholder="Entrez la quantité">


                                        <script src="https://cdn.kkiapay.me/k.js"></script>
                                        <div id="kkiapay-container"
                                            class="btn btn-lg btn-outline-dark btn-ecomm px-5 py-3"></div>
                                    </div>
                                </div>
                                <script src="https://cdn.kkiapay.me/k.js"></script>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const quickViewModal = document.getElementById('QuickViewModal');
                                        const kkiapayContainer = document.getElementById('kkiapay-container');
                                        const quantityInput = document.querySelector('.cart-buttons input[type="number"]');
                                        let currentArticle = null;

                                        quickViewModal.addEventListener('show.bs.modal', function(event) {
                                            const button = event.relatedTarget;
                                            const articleName = button.getAttribute('data-title');
                                            const articlePrice = parseFloat(button.getAttribute('data-price'));
                                            const articleId = button.getAttribute('data-id');

                                            document.querySelector('.product-title').textContent = articleName;
                                            document.querySelector('.product-price .fw-bold').textContent = `${articlePrice} XOF/Mois`;

                                            currentArticle = {
                                                id: articleId,
                                                name: articleName,
                                                price: articlePrice
                                            };

                                            updateKkiapayWidget();
                                        });

                                        quantityInput.addEventListener('input', updateKkiapayWidget);

                                        function updateKkiapayWidget() {
                                            if (!currentArticle) return;

                                            const quantity = parseInt(quantityInput.value) || 1;
                                            const totalAmount = currentArticle.price * quantity;

                                            kkiapayContainer.innerHTML = '';
                                            const widget = document.createElement('kkiapay-widget');
                                            widget.setAttribute('amount', totalAmount.toFixed(2));
                                            widget.setAttribute('key', 'cb876650e192fdf79d12342d023a6f4ebe257de4');
                                            widget.setAttribute('position', 'center');
                                            widget.setAttribute('sandbox', 'false');
                                            widget.setAttribute('callback', `https://caisse.savplus.net/paysuccess/${currentArticle.id}`);
                                            kkiapayContainer.appendChild(widget);
                                        }
                                    });
                                </script>
                                <hr class="my-3">
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var quickViewModal = document.getElementById('QuickViewModal');
            quickViewModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var title = button.getAttribute('data-title');
                var description = button.getAttribute('data-description');
                var price = button.getAttribute('data-price');
                var image = button.getAttribute('data-image');

                // Mettre à jour les éléments du modal avec les données de l'article
                quickViewModal.querySelector('.product-title').textContent = title;
                quickViewModal.querySelector('.product-info p').textContent = description;
                quickViewModal.querySelector('.product-price .h4').textContent = price + ' XOF';
                quickViewModal.querySelector('.slider-for img').src = image;
            });

            quickViewModal.addEventListener('hidden.bs.modal', function() {
                quantityInput.value = '';
            });
        });
    </script>
</body>

</html>
