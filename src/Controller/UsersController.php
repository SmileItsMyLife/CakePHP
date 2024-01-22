<?php
namespace App\Controller;

class UsersController extends AppController
{
    // Ação para exibir a lista de usuários
    public function index()
    {
        // Obtém todos os usuários do banco de dados
        $users = $this->Users->find('all');
        
        // Define a variável 'users' para ser utilizada na view
        $this->set(compact('users'));
    }

    // Ação para visualizar detalhes de um usuário
    public function view($id = null)
    {
        // Obtém os detalhes de um usuário específico pelo ID
        $user = $this->Users->get($id);
        
        // Define a variável 'user' para ser utilizada na view
        $this->set(compact('user'));
    }

    // Ação para adicionar um novo usuário
    public function add()
    {
        // Cria uma nova entidade de usuário com os dados do formulário
        $user = $this->Users->newEntity($this->request->getData());

        // Verifica se a requisição é do tipo POST
        if ($this->request->is('post')) {
            // Preenche a entidade de usuário com os dados do formulário
            $user = $this->Users->patchEntity($user, $this->request->getData());

            // Salva o usuário no banco de dados
            if ($this->Users->save($user)) {
                $this->Flash->success(__('O utilizador foi guardado.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Não é possível adicionar o utilizador.'));
            }
        }

        // Define a variável 'user' para ser utilizada na view
        $this->set('user', $user);
    }

    // Ação para editar os dados de um usuário
    public function edit($id = null)
    {
        // Obtém os dados de um usuário específico pelo ID
        $user = $this->Users->get($id);

        // Verifica se a requisição é do tipo POST ou PUT
        if ($this->request->is(['post', 'put'])) {
            // Preenche a entidade de usuário com os dados do formulário
            $this->Users->patchEntity($user, $this->request->getData());

            // Salva as alterações no usuário no banco de dados
            if ($this->Users->save($user)) {
                $this->Flash->success(__('O utilizador foi atualizado.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Utilizador não pôde ser atualizado.'));
            }
        }

        // Define a variável 'user' para ser utilizada na view
        $this->set('user', $user);
    }

    // Ação para excluir um usuário
    public function delete($id)
    {
        // Permite apenas requisições do tipo POST ou DELETE
        $this->request->allowMethod(['post', 'delete']);

        // Tenta obter os dados de um usuário pelo ID
        try {
            $user = $this->Users->get($id);
        } catch (\Cake\Datasource\Exception\RecordNotFoundException $e) {
            $this->Flash->error(__('utilizador não encontrado.'));
            return $this->redirect(['action' => 'index']);
        }

        // Tenta excluir o usuário do banco de dados
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('O utilizador com id: {0} foi eliminado.', h($id)));
            return $this->redirect(['action' => 'index']);
        } else {
            $this->Flash->error(__('O utilizador não pôde ser eliminado.'));
        }
    }
}