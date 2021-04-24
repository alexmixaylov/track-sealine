build-container:
	DOCKER_USER=1000:1000 docker-compose up -d --build
	#DOCKER_USER=$(idU):$(idG) docker-compose up -d --build

up-container:
	DOCKER_USER=1000:1000 docker-compose up -d
	#DOCKER_USER=$(idU):$(idG) docker-compose up -d

down-container:
	DOCKER_USER=1000:1000 docker-compose down

kill-services:
	echo "555123" | sudo -S systemctl stop nginx
	echo "555123" | sudo -S systemctl stop mysql

start-services:
	echo "555123" | sudo -S systemctl start nginx
	echo "555123" | sudo -S systemctl start mysql

build: kill-services build-container
up: kill-services up-container
down: down-container start-services

bash:
	docker exec -it lunch_php bash
