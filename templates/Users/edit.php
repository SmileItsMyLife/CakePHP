<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Configuração da codificação de caracteres e escala de visualização -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Formulário para adicionar um usuário -->
    <h1>Adicionar Usuário</h1>
    
    <?php
    // Início do formulário utilizando o método 'create' do CakePHP
    echo $this->Form->create($users);
    ?>
    
    <!-- Tabela para organizar os campos do formulário -->
    <table>
        <tr>
            <!-- Nomes das colunas da tabela -->
            <th>Id</th>
            <th>Name</th>
            <th>Login</th>
            <th>Password</th>
            <th>Email</th>
        </tr>
        <tr>
            <!-- Campos do formulário, utilizando o método 'input' do CakePHP para cada atributo -->
            <td><?php echo $this->Form->input('id'); ?></td>
            <td><?php echo $this->Form->input('name'); ?></td>
            <td><?php echo $this->Form->input('login'); ?></td>
            <td><?php echo $this->Form->input('password'); ?></td>
            <td><?php echo $this->Form->input('email'); ?></td>
        </tr>
    </table>
    
    <?php
    // Botão de envio do formulário e encerramento do formulário
    echo $this->Form->button(__('Autorizar usuário'));
    echo $this->Form->end();
    ?>
</body>

</html>