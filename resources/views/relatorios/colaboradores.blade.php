<!DOCTYPE html>
<html>
<head>
    <title>Relatório de Colaboradores</title>
    <style>
        body {
            text-align: center;
        }

        h1 {
            margin-top: 20px;
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
    <h1>Relatório de Colaboradores</h1>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>Unidade</th>
                <th>Cargo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($colaboradores as $colaborador)
                <tr>
                    <td>{{ $colaborador->nome }}</td>
                    <td>{{ $colaborador->cpf }}</td>
                    <td>{{ $colaborador->email }}</td>
                    <td>{{ $colaborador->unidade->nome_fantasia }}</td>
                    <td>{{ $colaborador->cargo->cargo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
