<x-layout>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card p-4" style="width: 50rem;">
            <div class="d-flex justify-content-center mb-4">
                <h3 class="card-title font-weight-bold" style="font-size: 2rem;">
                    Cadastrar Comissão
                </h3>
            </div>

            <form method="POST" action="{{ route('commissions.store') }}">
                @csrf
                <div class="row">

                    <div class="col-md-12 mb-3">
                        <label class="form-label" for="affiliate_id">Afiliado:</label>
                        <select class="form-control {{ $errors->has('affiliate_id') ? 'is-invalid' : '' }}"
                            id="affiliate_id" name="affiliate_id" required>
                            <option value="">Selecione o Afiliado</option>
                            @foreach ($activeAffiliates as $affiliate)
                                <option value="{{ $affiliate->id }}"
                                    {{ old('affiliate_id') == $affiliate->id ? 'selected' : '' }}>
                                    {{ $affiliate->name }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('affiliate_id'))
                            <div class="invalid-feedback">{{ $errors->first('affiliate_id') }}</div>
                        @endif
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="value">Valor:</label>
                        <input type="text" class="form-control" name="value" id="value" placeholder="Digite o valor" value="{{ old('value') }}">
                        @error('value')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="date">Data:</label>
                        <input class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}" type="date"
                            id="date" name="date" value="{{ old('date') }}" required>
                        @if ($errors->has('date'))
                            <div class="invalid-feedback">{{ $errors->first('date') }}</div>
                        @endif
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Salvar Comissão</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</x-layout>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputValor = document.getElementById('value');

        inputValor.addEventListener('input', function() {
            console.log('Valor sendo digitado:', this.value);

            let valueValor = this.value.replace(/[^\d]/g, '');

            let formattedValor = valueValor.slice(0, -2).replace(/\B(?=(\d{3})+(?!\d))/g, '.') + ',' +
                valueValor.slice(-2);

            this.value = formattedValor;

            console.log('Valor formatado:', this.value);
        });

        const form = inputValor.closest('form');
        form.addEventListener('submit', function() {
            let rawValue = inputValor.value.replace(/\./g, '').replace(',',
            '.');
            inputValor.value = rawValue;
            console.log('Valor enviado:', inputValor.value);
        });
    });
</script>
