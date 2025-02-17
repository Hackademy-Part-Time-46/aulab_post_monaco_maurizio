<x-layout>
<div class="container-fluid p-5 bg-secondary-subtle text-center">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="display-1"> Bentornato Amministratore {{Auth::user()->name}}</h1>
        </div>
    </div>
</div>
@if (session('message'))
<div class="alert alert-success">{{ session('message') }}

</div>
@endif

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2>Richieste per il ruolo di amministratore</h2>
            <x-requests-table :roleRequest="$adminRequests" role="amministratore" />
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2>Richieste per il ruolo di revisore</h2>
            <x-requests-table :roleRequest="$revisorRequests" role="revisore" />
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2>Richieste per il ruolo di redattore</h2>
            <x-requests-table :roleRequest="$writerRequests" role="redattore" />
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2>Tutti i tag</h2>
            <x-metainfo-table :metaInfos="$tags" metaType="tags" />
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2>Tutti le Categorie</h2>
            <form action="{{route('admin.storeCategory')}}" method="POST" class="w-50 d-flex m-3">
                @csrf
                <input type="text" name="name" class="form-control me-2" placeholder="Inserisci una nuova Categoria">
                <button type="submit" class="btn btn-outline-secondary"> Inserisci</button>
            </form>
            <x-metainfo-table :metaInfos="$categories" metaType="categorie" />
        </div>
    </div>
</div>



</x-layout>