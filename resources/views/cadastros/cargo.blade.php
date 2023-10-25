@extends('layouts.app')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Lista de Cargos</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Cadastros</li>
                <li class="breadcrumb-item active">Cargos</li>
            </ol>
        </nav>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-warning">
            {{ session('error') }}
        </div>
    @endif
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                    <br>
                        <div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#smallModal">
                                Novo
                            </button>

                            <div class="modal fade" id="smallModal" tabindex="-1">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Crie um novo Cargo</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('cargos.store') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Nome</label>
                                                    <input type="text" class="form-control" id="cargo" name="cargo">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Código</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Excluir</th>
                                    <th scope="col">Detalhes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($cargos as $cargo)
                                    <tr>
                                        <td scope="row">{{ $cargo->id }}</td>
                                        <td>{{ $cargo->cargo }}</td>
                                        <td>
                                            <form action="{{ route('cargos.destroy', $cargo->id) }}" method="post"
                                                class="ms-2">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger">Excluir</button>

                                            </form>
                                        </td>
                                        <td>
                                            <div>
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editModal{{ $cargo->id }}">
                                                    Editar
                                                </button>
                                            </div>
                                            <div class="modal fade" id="editModal{{ $cargo->id }}" tabindex="-1">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Editar cargo</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="{{ route('cargos.update', ['id' => $cargo->id]) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group">
                                                                    <label for="inputNome">Nome</label>
                                                                    <input type="text" class="form-control" id="cargo" name="cargo" value="{{ $cargo->cargo }}">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        @empty
                                        <p class="alert-warning" style="font-size:22px; text-align:center;">Nenhum Cargo Cadastrado</p>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@push('scripts')
<script>
</script>
