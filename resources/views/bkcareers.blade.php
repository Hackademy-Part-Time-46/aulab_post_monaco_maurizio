<x-layout>
    <h1>Lavora con noi</h1>
    <form action="{{ route('careers.submit') }}" method="POST">
        @csrf
        <div>
            <label for="role" class="form-label">Per quale ruolo ti stai candidando?</label>
            <select name="role" id="role">
                <option value="" selected disabled>Seleziona il ruolo</option>

                @if (!Auth::user()->is_admin)
                    <option value="admin">Amministratore</option>
                @endif

                @if (!Auth::user()->is_revisor)
                    <option value="revisor">Revisore</option>
                @endif

                @if (!Auth::user()->is_writer)
                    <option value="writer">Redattore</option>
                @endif
            </select>
            @error('role')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="email" class="form-label">Email</label>
            <input type="hidden" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}"
                >
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        
        <div>
            <label for="message" class="form-label">Perchè vuoi candidarti per questo ruolo? Raccontacelo</label>
            <textarea name="message" id="message" cols="30" rows="7" class="form-control">{{ old('message') }}</textarea>
            @error('message')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-outline-secondary">Invia Candidatura</button>
        </div>

    </form>
    <div>
        <h2>Lavoro come Amministratore</h2>
        <p>Scegliendo di lavorare come amministratore, ti occuperai di gestire le richieste di lavoro e di aggiungere e
            modificare le categorie</p>

        <h2>Lavoro come Revisore</h2>
        <p>Scegliendo di lavorare come revisore, deciderai se un articolo può essere pubblicato o meno in piattaforma
        </p>

        <h2>Lavoro come Redattore</h2>
        <p>Scegliendo di lavorare come redattore, potrai scrivere gli articoli che saranno pubblicati</p>

    </div>

</x-layout>
