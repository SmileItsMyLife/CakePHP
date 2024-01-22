<?php
// Namespace para o arquivo
namespace App\Model\Table;

// Importando classes necessárias
use Cake\Validation\Validator;
use Cake\ORM\Table;

// Definição da classe UsersTable, que extende a classe Table do CakePHP
class UsersTable extends Table {
    
    // Método de inicialização da tabela
    public function initialize(array $config): void {
        // Adicionando comportamento Timestamp para gerenciar campos de data de criação e modificação
        $this->addBehavior('Timestamp');
    }

    // Método para definição de regras de validação padrão
    public function validationDefault(Validator $validator): Validator
    {
        // Validação "not empty" para os campos login e password
        $validator
            ->notEmpty('login')
            ->notEmpty('password');

        // Validação para garantir que o campo 'id' é um número inteiro
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        return $validator;
    }
}