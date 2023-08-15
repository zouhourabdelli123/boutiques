<div class="container">
    @if (session('success'))
    <div class="alert alert-success" style="background-color: blue;color:white">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('duplicate_error'))
    <div class="alert alert-danger">
        {{ session('duplicate_error') }}
    </div>
@endif
    <form id="contact" action="{{ route('produit.store') }}" method="POST">

        @csrf
      <h3>Ajouter produit</h3>
      <div class="col-md-4">
        <label for="nom" class="form-label">nom</label>
        <input type="text" class="form-control" id="nom" name="nom" required>
    </div>
    <div class="col-md-4">
        <label for="prix" class="form-label">prix</label>
        <input type="text" class="form-control" id="prix" name="prix" required>
    </div>
    <div class="col-md-4">
        <label for="description" class="form-label">description</label>
        <input type="text" class="form-control" id="description" name="description" required>
    </div>
    <div class="col-md-4">
        <label for="quantité" class="form-label">quantité</label>
        <input type="text" class="form-control" id="quantité" name="quantité" required>
    </div>
    <div class="col-md-4">
        <label for="categorie" class="form-label">categorie</label>
        <input type="text" class="form-control" id="categorie" name="categorie" required>
    </div>
    <div class="col-md-12">
        <label for="image">Image</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
        @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
      <fieldset>
        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Ajouter</button>
      </fieldset>
    </form>


  </div>
<style> @import url(https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600);

    * {
        margin:0;
        padding:0;
        box-sizing:border-box;
        -webkit-box-sizing:border-box;
        -moz-box-sizing:border-box;
        -webkit-font-smoothing:antialiased;
        -moz-font-smoothing:antialiased;
        -o-font-smoothing:antialiased;
        font-smoothing:antialiased;
        text-rendering:optimizeLegibility;
    }

    body {
        font-family:"Open Sans", Helvetica, Arial, sans-serif;
        font-weight:300;
        font-size: 12px;
        line-height:30px;
        color:#777;
        background:#0CF;
    }

    .container {
        max-width:400px;
        width:100%;
        margin:0 auto;
        position:relative;
    }

    #contact input[type="text"], #contact input[type="email"], #contact input[type="tel"], #contact input[type="url"], #contact textarea, #contact button[type="submit"] { font:400 12px/16px "Open Sans", Helvetica, Arial, sans-serif; }

    #contact {
        background:#F9F9F9;
        padding:25px;
        margin:50px 0;
    }

    #contact h3 {
        color: #F96;
        display: block;
        font-size: 30px;
        font-weight: 400;
    }

    #contact h4 {
        margin:5px 0 15px;
        display:block;
        font-size:13px;
    }

    fieldset {
        border: medium none !important;
        margin: 0 0 10px;
        min-width: 100%;
        padding: 0;
        width: 100%;
    }

    #contact input[type="text"], #contact input[type="email"], #contact input[type="tel"], #contact input[type="url"], #contact textarea {
        width:100%;
        border:1px solid #CCC;
        background:#FFF;
        margin:0 0 5px;
        padding:10px;
    }

    #contact input[type="text"]:hover, #contact input[type="email"]:hover, #contact input[type="tel"]:hover, #contact input[type="url"]:hover, #contact textarea:hover {
        -webkit-transition:border-color 0.3s ease-in-out;
        -moz-transition:border-color 0.3s ease-in-out;
        transition:border-color 0.3s ease-in-out;
        border:1px solid #AAA;
    }

    #contact textarea {
        height:100px;
        max-width:100%;
      resize:none;
    }

    #contact button[type="submit"] {
        cursor:pointer;
        width:100%;
        border:none;
        background:#0CF;
        color:#FFF;
        margin:0 0 5px;
        padding:10px;
        font-size:15px;
    }

    #contact button[type="submit"]:hover {
        background:#09C;
        -webkit-transition:background 0.3s ease-in-out;
        -moz-transition:background 0.3s ease-in-out;
        transition:background-color 0.3s ease-in-out;
    }

    #contact button[type="submit"]:active { box-shadow:inset 0 1px 3px rgba(0, 0, 0, 0.5); }

    #contact input:focus, #contact textarea:focus {
        outline:0;
        border:1px solid #999;
    }
    ::-webkit-input-placeholder {
     color:#888;
    }
    :-moz-placeholder {
     color:#888;
    }
    ::-moz-placeholder {
     color:#888;
    }
    :-ms-input-placeholder {
     color:#888;
    }
    </style>
