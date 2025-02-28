# Ambiente Docker para Projeto Laravel com PHP 8.2.27

Este projeto utiliza o Docker para criar um ambiente de desenvolvimento para uma aplicação Laravel, utilizando o PHP 8.2.27. A configuração permite que o código do Laravel, localizado na pasta mãe, seja montado no container, possibilitando alterações em tempo real sem a necessidade de rebuildar a imagem.

## Pré-Requisitos

- **Docker** instalado na sua máquina.
- **Docker Compose** instalado.

## Estrutura de Pastas

- **Pasta Mãe:** Contém a aplicação Laravel.
- **docker/:** Pasta que contém os arquivos de configuração do Docker.
  - **Dockerfile:** Configura a imagem com PHP 8.2.27 e as dependências necessárias para o Laravel.
  - **docker-compose.yml:** Define os serviços do container.

## Instruções de Instalação e Execução

### 1. Navegue até a Pasta `docker`

Abra o terminal e mude para a pasta `docker`:
```bash
cd docker
```
### 2. Construa a imagem com as novas dependências:

```bash
docker-compose build
```

### 3. Inicie o container:

```bash
docker-compose up -d
```

### 3. Abra o container no Vs Code.

1. Instale a extensão

* Remote Development 

2. Certifique-se que o container está rodando e conecte-se nele pela extensão.

3. Conecte-se ao servidor remoto do git através do ambiente de desenvolvimento do container.
