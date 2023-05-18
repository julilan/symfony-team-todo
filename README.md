# TODO App with Symfony

## Usage

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

## 02: TODO application using Symfony

The idea of this mini-project 02 is to write Symfony code to Create a basic TODO application using Symfony and MySQL.

- TODO application must do all the basic operations, e.g. creating, reading, deleting etc.
- Collaborate with your team members
- Make sure everyone in team contributes
- Choose your own layout and design (CSS, UI/UX)
- Optional: Any simple additional features or new things you want to add (but do not overdo it)
