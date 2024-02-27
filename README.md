# Laravel Docker Project

This repository contains a Docker setup for a Laravel application.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

What things you need to install the software and how to install them:

- Docker
- Docker Compose

### Installing multiple Laravel Environments

A step by step series of examples that tell you how to get a development environment running:

#### Installation Only Laravel for Development

A step by step series of examples that tell you how to get a development environment running:

1. Clone the repository
2. Copy the `.env.example` file to `.env` and modify the environment variables
3. Run the following command to start the containers:

    ```bash
    docker-compose -f ./docker_setup/developer/only-laravel/docker-compose.yml up
    ```

4. Access the application at `http://localhost:9000`
5. For accessing to Docker container, run the following command:

    ```bash
    docker exec -it laravel_server /bin/sh
    ```

#### Installation MySQL & Laravel for Development

A step by step series of examples that tell you how to get a development environment running:

1. Clone the repository
2. Copy the `.env.example` file to `.env` and modify the environment variables
3. Run the following command to start the containers:

    ```bash
    docker-compose --env-file .env -f ./docker_setup/developer/mysql-laravel/docker-compose.yml up
    ```

4. Access the application at `http://localhost:9000`
5. For accessing to Docker container, run the following command:

    ```bash
    docker exec -it mysql_laravel_sever /bin/sh
    ```

#### Installation Laravel and Vite with React for Development

A step by step series of examples that tell you how to get a development environment running:

1. Clone the repository
2. Copy the `.env.example` file to `.env` and modify the environment variables
3. Run the following command to start the containers:

    ```bash
    docker-compose -f ./docker_setup/developer/laravel-vite/docker-compose.yml up
    ```

4. Access the application at `http://localhost:9000/react-view`
5. For accessing to Docker container, run the following command:

    ```bash
    docker exec -it laravel-vite_server /bin/sh
    ```
