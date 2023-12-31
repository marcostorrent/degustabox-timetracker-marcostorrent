# TimeTracker

Welcome to TimeTracker, a project designed to help you efficiently track your time. Below, you will find essential information for setting up and running this project.

## Table of Contents

- Requirements
- Getting Started
  - Clone the Repository
  - Build Docker Containers
  - Install Laravel and Database
  - Compile Assets
  - Run Docker Compose
  - Access the Application
- Stopping the Application
- License

## Project Description

This project is a technical assessment conducted by Marcos Torrent as part of his interview process for a position at DegustaBox. It serves as a sample technical task designed to evaluate skills and abilities.

## Requirements

Before you begin, ensure that you have Docker installed on your system.

## Getting Started

Follow these steps to get the TimeTracker project up and running:

### Clone the Repository

git clone https://github.com/marcostorrent/degustabox-timetracker-marcostorrent.git
cd TimeTracker

### Build Docker Containers

To start the Docker environment, use the following command:

docker-compose up -d --build

### Install Laravel and Database

docker exec -it php bash -c "composer update"
docker exec -it php bash -c "composer install"
docker exec -it php bash -c "npm install bootstrap"
docker exec -it php php artisan key:generate
docker exec -it php php artisan migrate
docker exec -it php php artisan storage:link
docker exec -it php php artisan config:cache
docker exec -it php php artisan route:cache

### Compile Assets

docker exec -it php bash -c "npm run build"

### Run Docker Compose

Once Docker Compose has completed creating the containers, you can access the TimeTracker application in your web browser. Open your browser and visit:

http://localhost:8888

TimeTracker application should be operational!

## Stopping the Application

To halt the application and Docker containers, you can use the following command:

docker-compose down

This will cease and remove the containers while preserving your application's data.
