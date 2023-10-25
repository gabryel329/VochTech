@extends('layouts.app')
@section('content')

<main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <span class="d-none d-lg-block">Teste Junior Voch Tech</span>
                </a>
              </div>

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Bem-vindo(a)</h5>
                  </div>

                  <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">E-mail</label>
                      <div class="input-group has-validation">
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="form-control">
                        <div class="invalid-feedback">Insira um E-mail valido.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Senha</label>
                      <div class="input-group has-validation">
                        <input type="password" id="password" name="password" required autocomplete="current-password" class="form-control">
                        <div class="invalid-feedback">Insira uma Senha valido!</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main>

@endsection
