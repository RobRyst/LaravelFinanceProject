# Makefile for Docker Compose commands

# Define services
DOCKER_COMPOSE = docker-compose

# Start the containers (up)
up:
	$(DOCKER_COMPOSE) up -d

# Bring down the containers and remove volumes
down:
	$(DOCKER_COMPOSE) down -v

# View logs of all containers
logs:
	$(DOCKER_COMPOSE) logs -f

# Rebuild and restart containers
rebuild:
	$(DOCKER_COMPOSE) up --build -d

# Stop the containers without removing them
stop:
	$(DOCKER_COMPOSE) stop

# Restart the containers
restart:
	$(DOCKER_COMPOSE) restart