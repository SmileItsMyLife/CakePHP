<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Arquivo: Templates/Users/index.php -->
    <h1>User List</h1>
    
    <!-- Link para adicionar um novo usuário -->
    <?= $this->Html->link('Adicionar user', ['action' => 'add']) ?>
    
    <!-- Tabela para exibir a lista de usuários -->
    <table>
        <!-- Cabeçalho da tabela -->
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Login</th>
            <th>Password</th>
            <th>Email</th>
            <th>Created</th>
            <th>Editar</th>
            <th>Apagar</th>
        </tr>

        <!-- Loop para exibir todos os registros de usuários -->
        <?php foreach ($users as $user): ?>
            <tr>
                <!-- Dados do usuário -->
                <td><?= $user->id ?></td>
                <td><?= $this->Html->link($user->name, ['action' => 'view', $user->id]) ?></td>
                <td><?= $this->Html->link($user->login, ['action' => 'view', $user->login]) ?></td>
                <td><?= $this->Html->link($user->password, ['action' => 'view', $user->login]) ?></td>
                <td><?= $this->Html->link($user->email, ['action' => 'view', $user->login]) ?></td>
                <td><?= ($user->created ? $user->created->format(DATE_RFC850) : 'N/A') ?></td>
                
                <!-- Link para a ação de editar -->
                <td><?= $this->Html->link('Editar', ['action' => 'edit', $user->id]) ?></td>
                
                <!-- Link para a ação de apagar com confirmação -->
                <td><?= $this->Form->postLink('Apagar', ['action' => 'delete', $user->id], ['confirm' => 'Apagar este usuário?']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>