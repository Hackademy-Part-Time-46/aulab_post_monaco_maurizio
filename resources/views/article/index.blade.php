<x-layout>
    <div class="container-fluid p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1">Tutti gli articoli</h1>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-evenly">
            @foreach ($articles as $article)
                <div class="col-12 col-md-4 col-lg-3 mb-4">
                    <div class="card shadow-sm">
                        <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="Immagine dell'articolo: {{ $article->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-subtitle text-muted">{{ $article->subtitle }}</p>
                            @if($article->category)
                            <p class="small text-muted">Categoria: 
                                <a href="{{ route('article.byCategory', $article->category) }}" class="text-capitalize text-muted">{{ $article->category->name }}</a>
                            </p>
                            @else
                            <p class="small text-muted">Nessuna Categoria</p>
                            @endif
                            <p class="small text-muted my-0">
                                @foreach ($article->tags as $tag)
                                #{{ $tag->name }} 
                                @endforeach
                            </p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <p class="mb-0">Redatto il {{ $article->created_at->format('d/m/y') }}<br>
                                da <a href="{{ route('article.byUser', $article->user) }}" class="text-capitalize text-muted">{{ $article->user->name }}</a>
                            </p>
                            <a href="{{ route('article.show', $article) }}" class="btn btn-outline-secondary">Leggi</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
