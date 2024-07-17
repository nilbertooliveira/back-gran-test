# Gran Cursos

## Ambiente Docker

Foi utlizado a arquitetura abaixo para concepção do projeto.


Estilo arquitetural: Hexagonal

Conceitos utilizados: Services, Repository, DI, IoC, Acl, Docker, Proxy Reverso e outros padrões.

OBS: Portas 80, 8081, 3306, 3000, 6001 e 6379 precisam estar liberadas.

1. Clonar o repositório em qualquer lugar na maquina:
     ```
    git clone https://github.com/nilbertooliveira/back-gran-test.git
    git clone https://github.com/nilbertooliveira/front-gran-test.git
     ```

2. Rodar o comando abaixo no backand para fazer o build do projeto, pulling das images, criar rede externa e hosts:
   ```
   ./entrypoint.sh 
   docker-compose up -d
   ```
3. Rodar o comando abaixo no front  (Unico passo necessário)
   ```
   docker-compose up -d
   ```

4. Instalar as dependências e permissões:
    ```
    docker exec app composer install
    docker exec app npm run build
    sudo chmod -R 777 storage/
    ```

5. Configurar a base de dados
    ```
    docker exec app php artisan migrate
    docker exec app php artisan db:seed
    ```

7. Dados para teste (LOCAL):
    ```
    Host: http://app.local.com.br
    Email: administrator@test.com.br
    Password: 123456
    ```

#### Documentação API
[Postman](https://documenter.getpostman.com/view/10569259/2sA3kRJiiW)
