<head>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>
<section class="section dashboard">
    <div class="col-lg-12">

<div class="card">
<div class="card-body">
  <h5 class="card-title">Default Table</h5>

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
            <td>{{ $produit->categorie }}</td>

            <td>
                @if ($produit->image)
                    <img src="{{ asset('public/images/categories/' . $produit->image) }}" alt="Image de catégorie" style="max-width: 100px;">
                @else
                    Aucune image
                @endif
            </td>
            <td>
                <form action="{{ route('produit.effacer', $produit->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit"><i class="bi bi-trash3"></i></button>


                </form>
                <button class="btn btn-sm btn-success edit-btn" type="button" data-toggle="modal" data-target="#editModal" data-id="{{ $produit->id }}"><i class="bi bi-pencil-square"></i></button>
            </td>
        </tr>
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier la catégorie</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm" method="POST" action="{{ route('produit.update', $produit->id) }}">
                            @method('PUT') <!-- Ajoutez cette ligne -->
                            @csrf
                <input type="hidden" name="categorie_id" id="categorie_id">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description">
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug">
                </div>
                <div class="col-md-12">
                    <label for="image">Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-primary" id="saveChangesBtn">Enregistrer les modifications</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
</table>
</div>
</div></div>
</div>
<script>
$(document).ready(function () {
    $('#example').DataTable();
});
</script>
<script>
$(document).ready(function () {
    $('#example').DataTable();

    $('.edit-btn').click(function () {
        const categoryId = $(this).data('id');
        $('#categorie_id').val(categoryId);
        const bootstrapModal = new bootstrap.Modal($('#editModal'));
        bootstrapModal.show();
    });

    $('#saveChangesBtn').click(function () {
$('#editForm').submit();
});
});
</script>


</section>
