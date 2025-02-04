<table class="table table-stripped table-hover">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach (roleRequest as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @switch ($role)
                    @case('amministratore')
                        <form action="{{ route('admin.setAdmin', $user) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-secondary">Attiva {{ $role }}</button>
                        </form>
                    @break

                    @switch ($role)
                        @case('revisore')
                            <form action="{{ route('admin.setRevisor', $user) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-secondary">Attiva {{ $role }}</button>
                            </form>
                        @break

                        @switch ($role)
                            @case('redattore')
                                <form action="{{ route('admin.setWriter', $user) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-secondary">Attiva {{ $role }}</button>
                                </form>
                            @break

                        @endswitch
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
