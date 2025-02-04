<x-layout>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Lavora con noi</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm p-4">
                    <form action="{{ route('careers.submit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="role" class="form-label">Per quale ruolo ti stai candidando?</label>
                            <select name="role" id="role" class="form-select">
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
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="hidden" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
                            @error('email')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Perché vuoi candidarti per questo ruolo? Raccontacelo</label>
                            <textarea name="message" id="message" class="form-control" rows="5">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-secondary">Invia Candidatura</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <h2 class="text-center">Opportunità di Lavoro</h2>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card shadow-sm p-3">
                        <h4>Lavoro come Amministratore</h4>
                        <p>Ti occuperai di gestire le richieste di lavoro e di aggiungere e modificare le categorie.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm p-3">
                        <h4>Lavoro come Revisore</h4>
                        <p>Deciderai se un articolo può essere pubblicato o meno in piattaforma.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm p-3">
                        <h4>Lavoro come Redattore</h4>
                        <p>Potrai scrivere gli articoli che saranno pubblicati.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
