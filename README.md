# Projeto Teste Junior Voch Tech

Bem-vindo ao projeto Teste Junior Voch Tech! Este é um projeto que envolve o desenvolvimento de um sistema de gerenciamento de colaboradores em um ambiente de múltiplas unidades, cargos e avaliações de desempenho.

## Instruções de Configuração

Antes de começar a utilizar o projeto, siga estas etapas de configuração:

1. Execute o Composer Install para atualizar e baixar as dependências do projeto:
 
 - composer install


2. Execute as migrações para criar as tabelas no banco de dados:

 - php artisan migrate


3. Para criar um usuário administrador, execute:

 - php artisan db:seed

4. Para criar cargos, execute:

 - php artisan db:seed --class=CargosSeeder

5. Para criar unidades, execute:

 - php artisan db:seed --class=UnidadesSeeder

6. Para criar colaboradores e seus relacionamentos (unidades, cargos), execute:

 - php artisan db:seed --class=ColaboradoresSeeder


Certifique-se de seguir essas etapas na ordem apropriada devido aos relacionamentos entre as tabelas.

## Funcionalidades do Projeto

O projeto inclui as seguintes funcionalidades:

1. **Cadastro de Unidades:** Permite o registro e gerenciamento de unidades com informações como nome fantasia, razão social e CNPJ.

2. **Cadastro de Colaboradores:** Permite o cadastro e gerenciamento de colaboradores vinculando-os a uma unidade e cargo específico. As informações incluem nome, CPF e e-mail.

3. **Avaliação de Desempenho:** Fornece a capacidade de cadastrar ou atualizar as notas de desempenho dos colaboradores em uma escala de 0 a 10.

4. **Relatórios:**

- Relatório de Colaboradores: Exibe o nome, CPF, e-mail, unidade e cargo de todos os colaboradores.

- Total de Colaboradores por Unidade: Apresenta informações sobre unidades, incluindo nome fantasia, razão social, CNPJ e o total de colaboradores em cada unidade.

- Ranking de Colaboradores Melhores Avaliados: Mostra os colaboradores melhor avaliados em ordem decrescente, com informações de nome, CPF, e-mail, unidade, cargo e nota de desempenho.

Sinta-se à vontade para explorar e usar essas funcionalidades de acordo com as necessidades do seu projeto.
