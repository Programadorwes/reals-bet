<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card p-4" style="width: 40rem;">
        <div class="d-flex justify-content-center mb-4">
            <h3 class="card-title font-weight-bold" style="font-size: 2rem;">
                @if($update)
                    Editar Usuário '{{ $name }}'
                @else
                    Registrar Usuário
                @endif
            </h3>
        </div>
        <div class="card-body">
            <form action="{{ $action }}" method="post">
                @csrf
                @if ($update)
                    @method('PUT')
                @endif

                <div class="form-group mb-4">
                    <label class="form-label" for="name">Nome:</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name"
                        @isset($name)value="{{ $name }}"@endisset>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label class="form-label" for="email">E-mail:</label>
                    <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email"
                        @isset($email)value="{{ $email }}"@endisset>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label class="form-label" for="password">Senha:</label>
                    <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password"
                        @isset($password)value="{{ $password }}"@endisset>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">
                        @if($update) Atualizar @else Registrar @endif
                    </button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary mx-2" style="font-size: 1.1rem;">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
