# TODO App

A basic TODO App with Symfony and MySQL using Doctrine.

## Setup

- Have Docker running for Symfony-MAMP
- Do git clone inside Symfony-MAMP folder:
```
git clone https://github.com/julilan/symfony-team-todo.git
```
- Rename folder to web
- Change database name in Symfony-MAMP .env file to 'tododb'
- In the terminal change to project directory and run the following to install dependencies:
```
composer install
```
- Restart Docker and check phpMyAdmin for tododb
- cd .. back to MAMP and go inside Docker container (use docker ps to check id for symfony-mamp-www) and run migrate
```
docker exec -it id_here /bin/sh
cd web
php bin/console doctrine:migrations:migrate
```
## Usage

- App home: http://localhost:8007/ 

Users can:
- Create a new todo
- See added todos listed on homepage
- Edit todo
- Delete todo

## Acknowledgments

- This app uses [Symfony-MAMP](https://github.com/kalwar/Symfony-MAMP) by [@kalwar](https://github.com/kalwar)

## Authors

- Michael Akerele [@stacknatic](https://github.com/stacknatic)
- Julianna Molnár [@julilan](https://github.com/julilan)
- Sahil Thapa [@sahilt2](https://github.com/sahilt2)
