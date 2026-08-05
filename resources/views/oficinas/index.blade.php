<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Oficinas</title>
</head>
<body>
    <h1>Cadastro de Oficinas</h1>

    <form action="/oficinas" method="post">
        @csrf

        <label for="nome_oficina">Nome da oficina</label><br>
        <input type="text" id="nome_oficina" name="nome_oficina" required><br><br>
        
        <label for="professor_responsavel">Professor responsável</label><br>
        <input type="text" id="professor_responsavel" name="professor_responsavel" required><br><br>

        <label for="carga_horaria">Carga horária</label><br>
        <input type="number" id="carga_horaria" name="carga_horaria" required><br><br>
        
        <label for="turno">Turno</label><br>
        <input type="text" id="turno" name="turno" required><br><br>

        <button type="submit">Salvar</button>
    </form>

    <h2>Oficinas cadastradas</h2>

    @if ($oficinas->isEmpty())
        <p>Nenhuma oficina cadastrada.</p>
    @else
        <ul>
            @foreach($oficinas as $oficina)
                <li> {{ $oficina->nome_oficina }} -  {{ $oficina->professor_responsavel }} - {{ $oficina->carga_horaria }} - {{ $oficina->turno }}</li>
            @endforeach
        </ul>
    @endif
    
</body>
</html>