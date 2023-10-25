@extends('layouts.app')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Lista de Colaboradores</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Cadastros</li>
                <li class="breadcrumb-item active">Colaboradores</li>
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
                                            <h5 class="modal-title">Crie um novo Colaborador</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('colaboradores.store') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Nome</label>
                                                    <input type="text" class="form-control" id="nome" name="nome">
                                                    <label>E-mail</label>
                                                    <input type="text" class="form-control" id="email" name="email">
                                                    <label>CPF</label>
                                                    <input type="text" class="form-control" id="cpf" name="cpf">
                                                    <label class="form-check-label">Unidades</label>
                                                    <select class="form-control" id="unidade_id" name="unidade_id" required>
                                                        <option disabled selected>Escolha
                                                        </option>
                                                        @foreach ($unidades as $unidade)
                                                            <option value="{{$unidade->id}}">{{$unidade->nome_fantasia}}</option>
                                                        @endforeach
                                                    </select>
                                                    <label class="form-check-label">Cargos</label>
                                                    <select class="form-control" id="cargo_id" name="cargo_id" required>
                                                        <option disabled selected>Escolha
                                                        </option>
                                                        @foreach ($cargos as $cargo)
                                                            <option value="{{$cargo->id}}">{{$cargo->cargo}}</option>
                                                        @endforeach
                                                    </select>
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
                                    <th scope="col">E-mail</th>
                                    <th scope="col">CPF</th>
                                    <th scope="col">Unidade</th>
                                    <th scope="col">Cargo</th>
                                    <th scope="col">Excluir</th>
                                    <th scope="col">Detalhes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($colaboradores as $colaborador)
                                    <tr>
                                        <td scope="row">{{ $colaborador->id }}</td>
                                        <td>{{ $colaborador->nome }}</td>
                                        <td>{{ $colaborador->email }}</td>
                                        <td>{{ $colaborador->cpf }}</td>
                                        <td>{{ $colaborador->unidade->nome_fantasia }}</td>
                                        <td>{{ $colaborador->cargo->cargo }}</td>
                                        <td>
                                            <form action="{{ route('colaboradores.destroy', $colaborador->id) }}" method="post"
                                                class="ms-2">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger">Excluir</button>

                                            </form>
                                        </td>
                                        <td>
                                            <div>
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editModal{{ $colaborador->id }}">
                                                    Editar
                                                </button>
                                            </div>
                                            <div class="modal fade" id="editModal{{ $colaborador->id }}" tabindex="-1">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Editar Unidade</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="{{ route('colaboradores.update', ['id' => $colaborador->id]) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group">
                                                                    <label>Nome</label>
                                                                    <input type="text" class="form-control" id="nome" name="nome" value="{{ $colaborador->nome }}">
                                                                    <label>E-mais</label>
                                                                    <input type="text" class="form-control" id="email" name="email" value="{{ $colaborador->email }}">
                                                                    <label>CPF</label>
                                                                    <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $colaborador->cpf }}">
                                                                    <label class="form-check-label">Unidades</label>
                                                                    <select class="form-control" id="unidade_id" name="unidade_id" required>
                                                                        <option disabled selected>{{ $colaborador->unidade->nome_fantasia }}</option>
                                                                        @foreach ($unidades as $unidade)
                                                                            <option value="{{$unidade->id}}">{{$unidade->nome_fantasia}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <label class="form-check-label">Cargo</label>
                                                                    <select class="form-control" id="cargo_id" name="cargo_id" required>
                                                                        <option disabled selected>{{ $colaborador->cargo->cargo }}</option>
                                                                        @foreach ($cargos as $cargo)
                                                                            <option value="{{$cargo->id}}">{{$cargo->cargo}}</option>
                                                                        @endforeach
                                                                    </select>
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
                                        <p class="alert-warning" style="font-size:22px; text-align:center;">Nenhum Colaborador Cadastrado</p>
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
