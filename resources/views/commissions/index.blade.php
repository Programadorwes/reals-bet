<x-layout title="Consulta de Comissão de Afiliados">
    @isset($mensagemSucesso)
        <div class="alert alert-success">
            {{ $mensagemSucesso }}
        </div>
    @endisset


    <div class="card rounded shadow-sm p-3" style="margin-bottom:10px">
        <div class="row">
            <div class="col-12 text-end">
                <a href="{{ route('commissions.create') }}" class="btn btn-primary btn-sm">
                    Adicionar Comissão
                </a>
            </div>
            <div class="col-sm-12 table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th class="d-none d-md-table-cell">Afiliado</th>
                            <th class="d-none d-md-table-cell">Valor</th>
                            <th class="d-none d-md-table-cell">Data</th>
                            <th class="d-none d-md-table-cell">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($commissions as $commission)
                            <tr>
                                <td class="d-none d-md-table-cell">{{ $commission->affiliate->name }}</td>
                                <td class="d-none d-md-table-cell">{{ $commission->value }}</td>
                                <td class="d-none d-md-table-cell">{{ (new DateTimeImmutable($commission->date))->format('d/m/Y') }}</td>
                                <td class="d-none d-md-table-cell">
                                    <form action="{{ route('commissions.destroy', $commission->id) }}" method="post"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
