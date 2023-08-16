<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>
<section class="section dashboard">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <!-- Default Table -->
                <table id="example" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>nom</th>
                            <th>prix</th>
                            <th>description</th>
                            <th>quantité</th>
                            <th>categorie</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pro as $produit)
                        <tr>
                            <td>{{ $produit->nom }}</td>
                            <td>{{ $produit->prix }}</td>
                            <td>{{ $produit->description }}</td>
                            <td>{{ $produit->quantité }}</td> <!-- Ajout de quantité -->
                            <td>{{ $produit->cate->nom }}</td> <!-- Utilisation de la relation cate -->
                            <td>
                                @if ($produit->image)
                                <img src="{{ asset('public/images/categories/' . $produit->image) }}" alt="Image de catégorie" style="max-width: 100px;">
                                @else
                                Aucune image
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('produit.effacer', $produit->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">supprimer</button>
                                </form>
                                <button class="btn btn-sm btn-success edit-btn" type="button" data-toggle="modal" data-target="#editModal" data-id="{{ $produit->id }}">modifier</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Modal de modification -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Modifier le produit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulaire de modification -->
                <form id="editForm" action="{{ route('produit.update', $produit->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="categorie_id">Catégorie</label>
                        <select class="form-control" id="categorie_id" name="categorie_id">
                          
                        </select>
                    </div>
                    <!-- Autres champs à modifier -->

                    <button type="submit" class="btn btn-primary" id="saveChangesBtn">Enregistrer les modifications</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#example').DataTable();

        $('.edit-btn').click(function () {
            const productId = $(this).data('id');
            $('#editForm').attr('action', '/produit/' + productId); // Mise à jour de l'action du formulaire
            const bootstrapModal = new bootstrap.Modal($('#editModal'));
            bootstrapModal.show();
        });

        $('#saveChangesBtn').click(function () {
            $('#editForm').submit();
        });
    });
</script>
