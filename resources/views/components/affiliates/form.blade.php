<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card p-4" style="width: 50rem;">
        <div class="d-flex justify-content-center mb-4">
            <h3 class="card-title font-weight-bold" style="font-size: 2rem;">
                @if ($update)
                    Editar Afiliado '{{ $name }}'
                @else
                    Cadastrar Afiliado
                @endif
            </h3>
        </div>
        <form action="{{ $action }}" method="post">
            @csrf
            @if ($update)
                @method('PUT')
            @endif
            <div class="row mb-3">
                <!-- Nome -->
                <div class="col-md-12">
                    <label class="form-label" for="name">Nome:</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" id="name"
                        name="name" @isset($name)value="{{ $name }}"@endisset>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- CPF -->
                <div class="col-md-12">
                    <label class="form-label" for="cpf">CPF:</label>
                    <input class="form-control @error('cpf') is-invalid @enderror" type="text" id="cpf"
                        name="cpf" maxlength="14" placeholder="___.___.___-__"
                        @isset($cpf)value="{{ $cpf }}"@endisset>
                    @error('cpf')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- E-mail -->
                <div class="col-md-12">
                    <label class="form-label" for="email">E-mail:</label>
                    <input class="form-control @error('email') is-invalid @enderror" type="email" id="email"
                        name="email" @isset($email)value="{{ $email }}"@endisset>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Data de Nascimento -->
                <div class="col-md-6">
                    <label class="form-label" for="birthdate">Data Nascimento:</label>
                    <input class="form-control @error('birthdate') is-invalid @enderror" type="date" id="birthdate"
                        name="birthdate" @isset($birthdate)value="{{ $birthdate }}"@endisset>
                    @error('birthdate')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Telefone -->
                <div class="col-md-6">
                    <label class="form-label" for="phone">Telefone:</label>
                    <input class="form-control @error('phone') is-invalid @enderror" type="number" id="phone"
                        name="phone" @isset($phone)value="{{ $phone }}"@endisset>
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Endereço -->
                <div class="col-md-12">
                    <label class="form-label" for="address">Endereço:</label>
                    <input class="form-control @error('address') is-invalid @enderror" type="text" id="address"
                        name="address" @isset($address)value="{{ $address }}"@endisset>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Estado -->
                <div class="col-md-6">
                    <label class="form-label" for="state">Estado:</label>
                    <select class="form-control @error('state') is-invalid @enderror" id="state" name="state">
                        <option value="">Selecione o Estado</option>
                        <!-- Estados carregados via API -->
                    </select>
                    @error('state')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Cidade -->
                <div class="col-md-6">
                    <label class="form-label" for="city">Cidade:</label>
                    <select class="form-control @error('city') is-invalid @enderror" id="city" name="city">
                        <option value="">Selecione a Cidade</option>
                        <!-- Cidades carregadas via API -->
                    </select>
                    @error('city')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-center">
                @if ($update)
                    <button type="submit" class="btn btn-primary">Salvar</button>
                @else
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                @endif
            </div>
        </form>

    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cpfInput = document.getElementById('cpf');
        const errorDiv = document.getElementById('cpf-error');

        cpfInput.addEventListener('input', function() {
            let value = cpfInput.value.replace(/\D/g, '');
            if (value.length <= 3) {
                cpfInput.value = value;
            } else if (value.length <= 6) {
                cpfInput.value = value.replace(/(\d{3})(\d{0,3})/, '$1.$2');
            } else if (value.length <= 9) {
                cpfInput.value = value.replace(/(\d{3})(\d{3})(\d{0,3})/, '$1.$2.$3');
            } else {
                cpfInput.value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{0,2})/, '$1.$2.$3-$4');
            }

            // Validação do CPF
            if (value.length === 11) {
                if (!validateCPF(value)) {
                    errorDiv.style.display = 'block';
                } else {
                    errorDiv.style.display = 'none';
                }
            } else {
                errorDiv.style.display =
                    'none';
            }
        });
    });

    function validateCPF(cpf) {
        cpf = cpf.replace(/\D/g, '');

        if (cpf.length !== 11) {
            return false;
        }

        if (/^(\d)\1{10}$/.test(cpf)) {
            return false;
        }

        let sum = 0;
        for (let i = 0; i < 9; i++) {
            sum += parseInt(cpf.charAt(i)) * (10 - i);
        }
        let firstCheckDigit = 11 - (sum % 11);
        if (firstCheckDigit === 10 || firstCheckDigit === 11) {
            firstCheckDigit = 0;
        }

        sum = 0;
        for (let i = 0; i < 10; i++) {
            sum += parseInt(cpf.charAt(i)) * (11 - i);
        }
        let secondCheckDigit = 11 - (sum % 11);
        if (secondCheckDigit === 10 || secondCheckDigit === 11) {
            secondCheckDigit = 0;
        }

        if (firstCheckDigit === parseInt(cpf.charAt(9)) && secondCheckDigit === parseInt(cpf.charAt(10))) {
            return true;
        } else {
            return false;
        }
    }

    $(document).ready(function() {
        $('#state').select2({
            placeholder: 'Selecione o Estado',
            allowClear: true
        });

        $('#city').select2({
            placeholder: 'Selecione a Cidade',
            allowClear: true
        });

        function loadStates() {
            fetch('https://servicodados.ibge.gov.br/api/v1/localidades/estados')
                .then(response => response.json())
                .then(data => {
                    const stateSelect = $('#state');
                    stateSelect.empty();
                    stateSelect.append(
                        '<option value="">Selecione o Estado</option>');
                    data.forEach(state => {
                        stateSelect.append(new Option(state.nome, state.sigla));
                    });

                    if ("{{ old('state', $state ?? '') }}") {
                        stateSelect.val("{{ old('state', $state ?? '') }}").trigger('change');
                    }
                })
                .catch(error => console.error('Erro ao carregar os estados:', error));
        }

        function loadCities(stateSigla) {
            fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${stateSigla}/municipios`)
                .then(response => response.json())
                .then(data => {
                    const citySelect = $('#city');
                    citySelect.empty();
                    citySelect.append(
                        '<option value="">Selecione a Cidade</option>');
                    data.forEach(city => {
                        citySelect.append(new Option(city.nome, city.nome));
                    });

                    if ("{{ old('city', $city ?? '') }}") {
                        citySelect.val("{{ old('city', $city ?? '') }}").trigger('change');
                    }
                })
                .catch(error => console.error('Erro ao carregar as cidades:', error));
        }

        loadStates();

        $('#state').on('change', function() {
            const stateSigla = $(this).val();
            if (stateSigla) {
                loadCities(stateSigla);
            } else {
                $('#city').html('<option value="">Selecione a Cidade</option>').trigger('change');
            }
        });
    });
</script>
