@extends('layouts.app')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Avaliação de Desempenho</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Avaliação de Desempenho</li>
                <li class="breadcrumb-item active"></li>
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
                                            <h5 class="modal-title">Crie uma nova Avaliação</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('cargocolaboradores.store') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label class="form-check-label">Colaborador</label>
                                                    <select class="form-control" onchange="colaborador(this.value)" id="colaborador-select"  name="colaborador_id" required>
                                                        <option disabled selected>Escolha
                                                        </option>
                                                        @foreach ($colaboradores as $colaborador)
                                                            <option value="{{$colaborador->id}}">{{$colaborador->nome}}</option>
                                                        @endforeach
                                                    </select>
                                                    <label>Cargo</label>
                                                    <input type="text" class="form-control" id="cargo-display">
                                                    <input style="display:none;" id="cargo-id-input" name="cargos_id">
                                                    <label>Nota</label>
                                                    <input type="number" class="form-control" id="nota-desempenho" min="0" max="10" name="nota_desempenho">
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
                                    <th scope="col">Colaborador</th>
                                    <th scope="col">Cargo</th>
                                    <th scope="col">Nota</th>
                                    <th scope="col">Excluir</th>
                                    <th scope="col">Detalhes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($cargocolaboradores as $cargocolaborador)
                                    <tr>
                                        <td scope="row">{{ $cargocolaborador->id }}</td>
                                        <td>{{ $cargocolaborador->colaborador->nome }}</td>
                                        <td>{{ $cargocolaborador->cargo->cargo }}</td>
                                        <td>{{ $cargocolaborador->nota_desempenho }}</td>
                                        <td>
                                            <form action="{{ route('cargocolaboradores.destroy', $cargocolaborador->id) }}" method="post"
                                                class="ms-2">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger">Excluir</button>

                                            </form>
                                        </td>
                                        <td>
                                            <div>
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editModal{{ $cargocolaborador->id }}">
                                                    Editar
                                                </button>
                                            </div>
                                            <div class="modal fade" id="editModal{{ $cargocolaborador->id }}" tabindex="-1">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Editar Unidade</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="{{ route('cargocolaboradores.update', ['id' => $cargocolaborador->id]) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group">
                                                                    <label>Colaborador</label>
                                                                    <input type="text" class="form-control" disabled id="{{ $cargocolaborador->colaborador->nome }}" value="{{ $cargocolaborador->colaborador->nome }} ">
                                                                    <label>Cargo</label>
                                                                    <input type="text" class="form-control" disabled id="cargo-display{{$cargocolaborador->id}}" value="{{ $cargocolaborador->cargo->cargo }}">
                                                                    <label>Nota</label>
                                                                    <input type="text" class="form-control" min="0" max="10" id="nota_desempenho{{$cargocolaborador->id}}" name="nota_desempenho" value="{{ $cargocolaborador->nota_desempenho }}">
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
                                        <p class="alert-warning" style="font-size:22px; text-align:center;">Nenhuma Avaliação Cadastrada</p>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

    function colaborador(id)
    {
        $.get('/cargocolaboradores/' +id, function(data) {
            $('#cargo-display').val(data.cargo);
            $('#cargo-id-input').val(data.id);
        });
    }

</script>



