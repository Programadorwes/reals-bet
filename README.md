<p align="center">
  <img src="./public/images/login.jpg" alt="RealsBet">
  <img src="./public/images/registrar.jpg" alt="RealsBet">
</p>

# RealsBet - PHP Laravel Pleno

# Requisitos

# Usuários
- Deve existir uma tela para o Cadastro do Usuário
- Deve existir uma tela para a listagem dos Usuários Cadastrados
- Deve permitir a edição do Cadastro de Usuário
- Deve permitir a inativar um Usuário Cadastrado

# Afiliados
- Deve existir uma tela para o Cadastro do Afiliado
- Deve existir uma tela para a listagem dos Afiliados Cadastrados
- Deve permitir a edição do Cadastro de Afiliado
- Deve permitir a inativar um Afiliado Cadastrado

# Comissão de Afiliado
- Deve existir uma tela para o Adicionar uma comissão a um afiliado
- Deve permitir excluir uma Comissão de Afiliado
- Deve existir uma tela para Consulta de Comissão do Afiliado

# Cadastro de Usuários
- E-mail
- Senha
- Nome

# Cadastro de Afiliados
- Nome
- CPF
- Data Nascimento
- Email
- Telefone
- Endereço
- Cidade (Campo de Seleção)
- Estado (Campo de Seleção)

# Comissão
- Afiliado
- Valor (Pode ser positivo ou negativo)
- Data

# Observações
- Ao selecionar o estado, deverá aparecer as cidades do estado selecionado.
- O Valor da comissão informado pode ser tanto positivo como nagativo, mantendo o sinal)
- Pode ser usado para o Front qualquer framework de CSS ao seu desejo (Bootstrap, Tailwindcss,Bulma, Material, etc..)


## Tech Stack

[![My Skills](https://skillicons.dev/icons?i=php,laravel,mysql,bootstrap)](https://skillicons.dev)

## Getting Started

1. **Clone o repositório**: `git clone https://github.com/vitormarinheiro1/RealsBet.git`
2. **Acesse a pasta do projeto**: `cd RealsBet`
3. **Instale as dependências**: `composer install`
4. **Configure as variáveis de ambiente**:  
   - Renomeie o arquivo `.env.example` para `.env`.  
   - Atualize o arquivo `.env` com suas credenciais do banco de dados (`DB_USERNAME` e `DB_PASSWORD`).
5. **Gere a chave da aplicação**: `php artisan key:generate`
6. **Configure o banco de dados**: `php artisan migrate`
7. **Popule o banco de dados (opcional)**: `php artisan db:seed`
8. **Inicie o servidor de desenvolvimento**: `php artisan serve`
