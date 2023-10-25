@extends('layouts.app')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Lista de Unidades</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Cadastros</li>
                <li class="breadcrumb-item active">Unidades</li>
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
                                            <h5 class="modal-title">Crie uma nova Unidade</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('unidades.store') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Nome Fantasia</label>
                                                    <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia">
                                                    <label>Razão Social</label>
                                                    <input type="text" class="form-control" id="razao_social" name="razao_social">
                                                    <label>CNPJ</label>
                                                    <input type="text" class="form-control" id="cnpj" name="cnpj">
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
                                    <th scope="col">Nome Fantasia</th>
                                    <th scope="col">Razão Social</th>
                                    <th scope="col">CNPJ</th>
                                    <th scope="col">Excluir</th>
                                    <th scope="col">Detalhes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($unidades as $unidade)
                                    <tr>
                                        <td scope="row">{{ $unidade->id }}</td>
                                        <td>{{ $unidade->nome_fantasia }}</td>
                                        <td>{{ $unidade->razao_social }}</td>
                                        <td>{{ $unidade->cnpj }}</td>
                                        <td>
                                            <form action="{{ route('unidades.destroy', $unidade->id) }}" method="post"
                                                class="ms-2">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger">Excluir</button>

                                            </form>
                                        </td>
                                        <td>
                                            <div>
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editModal{{ $unidade->id }}">
                                                    Editar
                                                </button>
                                            </div>
                                            <div class="modal fade" id="editModal{{ $unidade->id }}" tabindex="-1">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Editar Unidade</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="{{ route('unidades.update', ['id' => $unidade->id]) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group">
                                                                    <label>Nome Fantasia</label>
                                                                    <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia" value="{{ $unidade->nome_fantasia }}">
                                                                    <label>Razão Social</label>
                                                                    <input type="text" class="form-control" id="razao_social" name="razao_social" value="{{ $unidade->razao_social }}">
                                                                    <label>CNPJ</label>
                                                                    <input type="text" class="form-control" id="cnpj" name="cnpj" value="{{ $unidade->cnpj }}">
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
                                        <p class="alert-warning" style="font-size:22px; text-align:center;">Nenhuma Unidade Cadastrado</p>
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
