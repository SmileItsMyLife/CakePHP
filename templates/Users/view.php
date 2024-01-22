<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Tabela para exibir dados de um usuário -->
    <table>
        <!-- Primeira linha da tabela contendo os nomes das colunas -->
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Login</th>
            <th>Password</th>
            <th>Email</th>
            <th>Created</th>
        </tr>
        <!-- Segunda linha da tabela contendo os dados do usuário -->
        <tr>
            <!-- Cada coluna representa um atributo do usuário -->
            <th><?= h($users->id) ?></th>
            <th><?= h($users->name) ?></th>
            <th><?= h($users->login) ?></th>
            <th><?= h($users->password) ?></th>
            <th><?= h($users->email) ?></th>
            <!-- A coluna 'Created' exibe a data de criação formatada ou 'N/A' se não estiver definida -->
            <th><?= ($users->created ? $users->created->format(DATE_RFC850) : 'N/A') ?></th>
        </tr>
    </table>
</body>

</html>