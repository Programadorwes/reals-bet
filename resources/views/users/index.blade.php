<x-layout title="Usuários Cadastrados">
    @isset($mensagemSucesso)
        <div class="alert alert-success">
            {{ $mensagemSucesso }}
        </div>
    @endisset

    <div class="card rounded shadow-sm p-3" style="margin-bottom:10px">
        <div class="row">

            <div class="col-12 text-end">
                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">
                    Cadastrar usuário
                </a>
            </div>

            <div class="col-sm-12 table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th class="d-none d-md-table-cell">Nome</th>
                            <th class="d-none d-md-table-cell">E-mail</th>
                            <th class="d-none d-md-table-cell" [width]="150">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="{{ $user->active ? '' : 'table-danger' }}">
                                <td class="d-none d-md-table-cell">{{ $user->name }}</td>
                                <td class="d-none d-md-table-cell">{{ $user->email }}</td>
                                <td style="text-align: right;">
                                    <span class="d-flex">
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="btn btn-primary">Editar</a>
                                        <form action="{{ route('users.toggle-active', $user->id) }}" method="POST"
                                            class="ms-2">
                                            @csrf
                                            @method('PATCH')

                                            <button type="submit"
                                                class="btn btn-{{ $user->active ? 'danger' : 'success' }}">
                                                {{ $user->active ? 'Inativar' : 'Ativar' }}
                                            </button>
                                        </form>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
