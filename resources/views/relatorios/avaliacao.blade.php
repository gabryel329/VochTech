<!DOCTYPE html>
<html>
<head>
    <title>Relatório de Avaliação</title>
    <style>
        body {
            text-align: center;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Relatório de Avaliação de Colaboradores</h1>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>Unidade</th>
                <th>Cargo</th>
                <th>Nota de Desempenho</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($colaboradores as $colaborador)
                <tr>
                    <td>{{ $colaborador->nome }}</td>
                    <td>{{ $colaborador->cpf }}</td>
                    <td>{{ $colaborador->email }}</td>
                    <td>{{ $colaborador->nome_fantasia }}</td>
                    <td>{{ $colaborador->cargo }}</td>
                    <td>{{ $colaborador->nota_desempenho }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>


