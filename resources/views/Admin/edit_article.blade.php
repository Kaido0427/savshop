<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Articles |SAVOIR PLUS CONSEIL</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light" style="background-color: #191E37;">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('image/logo.png') }}" height="80" width="80" class="mr-2" style="object-fit: contain;" alt="logo de SAVPLUS CONSEIL">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <!-- Placez vos éléments de menu gauche ici -->
                </ul>
    
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: white;">
                            {{ Auth::user()->name }}
                        </a>
    
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/">{{__('Accueil')}}</a>
                            <a class="dropdown-item" href="{{ route('admin.transactions') }}" style="color: #191E37;">{{ __('Les transactions') }}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                style="color: #191E37;">
                                {{ __('Logout') }}
                            </a>
    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th class="col-md-4 text-center">Nom Article</th>
                    <th class="col-md-3 text-center">Prix</th> 
                    <th class="col-md-5 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                <tr>
                    <td class="align-middle text-center">{{ $article->nom_article }}</td>
                    <td class="align-middle text-center">{{ $article->prix }} XOF</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-primary btn-sm edit-article" 
                            data-id="{{ $article->id }}"
                            data-nom="{{ $article->nom_article }}"
                            data-prix="{{ $article->prix }}"
                            data-categorie="{{ $article->categorie_id }}"
                            data-bs-toggle="modal"
                            data-bs-target="#editArticleModal">
                            Mettre à jour
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    

    <!-- Modal de mise à jour de l'article -->
    <div class="modal fade" id="editArticleModal" tabindex="-1" aria-labelledby="editArticleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editArticleModalLabel">Modifier Article</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateArticleForm">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="article_id">
                        <div class="mb-3">
                            <label for="nom_article" class="form-label">Nom Article</label>
                            <input type="text" class="form-control" id="nom_article" name="nom_article">
                        </div>
                        <div class="mb-3">
                            <label for="prix" class="form-label">Prix</label>
                            <input type="text" class="form-control" id="prix" name="prix">
                        </div>
                        <div class="mb-3">
                            <label for="categorie_id" class="form-label">Catégorie</label>
                            <select class="form-control" id="categorie_id" name="categorie_id">
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Ajoutez d'autres champs à mettre à jour ici -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // Script pour charger les données de l'article dans le modal
        $(document).on('click', '.edit-article', function() {
            var button = $(this);
            var articleId = button.data('id');
            var nomArticle = button.data('nom');
            var prix = button.data('prix');
            var categorieId = button.data('categorie');

            var modal = $('#editArticleModal');
            modal.find('.modal-title').text('Modifier l\'article ' + nomArticle);
            modal.find('#article_id').val(articleId);
            modal.find('#nom_article').val(nomArticle);
            modal.find('#prix').val(prix);
            modal.find('#categorie_id').val(categorieId);
        });

        // Script AJAX pour mettre à jour via AJAX
        $('#updateArticleForm').submit(function(e) {
            e.preventDefault();
            var article_id = $('#article_id').val();
            var formData = $(this).serialize();
            $.ajax({
                type: 'PATCH',
                url: '{{ route('articles.update', ['id' => ':id']) }}'.replace(':id', article_id),
                data: formData,
                success: function(response) {
                    alert(response.message);
                    $('#editArticleModal').modal('hide');
                    // Rafraîchir la liste des articles après mise à jour
                    location.reload(); // Cette ligne rafraîchira la page
                },
                error: function(error) {
                    console.log(error);
                    alert('Erreur lors de la mise à jour de l\'article.');
                }
            });
        });
    </script>

</body>


</html>
