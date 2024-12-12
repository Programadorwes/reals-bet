<x-layout>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card p-4" style="width: 40rem;">
            <div class="d-flex justify-content-center mb-4">
                <h3 class="card-title font-weight-bold" style="font-size: 2rem;">Login</h3>
            </div>
            <form method="post" class="p-3">
                @csrf
                <div class="form-group mb-4">
                    <label class="form-label" for="email">E-mail:</label>
                    <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="password" class="form-label font-weight-bold" style="font-size: 1.1rem;">Senha</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" style="font-size: 1.1rem;">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    @if ($errors->has('login'))
                        <div class="alert alert-danger">{{ $errors->first('login') }}</div>
                    @endif
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mx-2" style="font-size: 1.1rem;">Entrar</button>
                        <a href="{{ route('users.create') }}" class="btn btn-secondary mx-2" style="font-size: 1.1rem;">Registrar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout>
