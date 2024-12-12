<x-layout title="Afiliados Cadastrados">
    @isset($mensagemSucesso)
        <div class="alert alert-success">
            {{ $mensagemSucesso }}
        </div>
    @endisset
    
    <div class="card rounded shadow-sm p-3" style="margin-bottom:10px">
        <div class="row">
            <div class="col-12 text-end">
                <a href="{{ route('affiliates.create') }}"  class="btn btn-primary btn-sm">
                    Cadastrar Afiliado
                </a>
            </div>
            <div class="col-sm-12 table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th class="d-none d-md-table-cell">Nome</th>
                            <th class="d-none d-md-table-cell">CPF</th>
                            <th class="d-none d-md-table-cell">Data de Nascimento</th>
                            <th class="d-none d-md-table-cell">E-mail</th>
                            <th class="d-none d-md-table-cell">Telefone</th>
                            <th class="d-none d-md-table-cell">Endereço</th>
                            <th class="d-none d-md-table-cell">Cidade</th>
                            <th class="d-none d-md-table-cell">Estado</th>
                            <th class="d-none d-md-table-cell">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($affiliates as $affiliate)
                            <tr class="{{ $affiliate->active ? '' : 'table-danger' }}">
                                <td class="d-none d-md-table-cell" >{{ $affiliate->name }}</td>
                                <td class="d-none d-md-table-cell" >{{ preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', subject: $affiliate->cpf) }}</td>
                                <td class="d-none d-md-table-cell" >{{ (new DateTimeImmutable($affiliate->birthdate))->format('d/m/Y') }}</td>
                                <td class="d-none d-md-table-cell" >{{ $affiliate->email }}</td>
                                <td class="d-none d-md-table-cell" >{{ preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $affiliate->phone) }}</td>
                                <td class="d-none d-md-table-cell" >{{ $affiliate->address }}</td>
                                <td class="d-none d-md-table-cell" >{{ $affiliate->city }}</td>
                                <td class="d-none d-md-table-cell" >{{ $affiliate->state }}</td>
                                <td class="d-none d-md-table-cell" >
                                    <span class="d-flex">
                                        <a href="{{ route('affiliates.edit', $affiliate->id) }}" class="btn btn-primary">Editar</a>
                                        <form action="{{ route('affiliates.toggle-active', $affiliate->id) }}" method="POST"
                                            class="ms-2">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-{{ $affiliate->active ? 'danger' : 'success' }}">
                                                {{ $affiliate->active ? 'Inativar' : 'Ativar' }}
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