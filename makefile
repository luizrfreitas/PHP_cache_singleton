# .env file
include .env

# Colors
RESET := "\033[0m"
GREEN := "\033[1;32m"
YELLOW := "\033[1;33m"
BLUE := "\033[1;34m"
RED := "\033[1;31m"

# .DEFAULT_GOAL := help

# help:
# 	echo "Hello, World!"

build-project-dev:
	@echo -e $(GREEN)"Building services trough docker. Environment: development"$(RESET)
	@docker-compose -f docker-compose.prod.yml -f docker-compose.dev.yml up -d --build
	@echo -e $(GREEN)"Project built!"$(RESET)

build-project-prod:
	@echo $(GREEN)"Building services trough docker. Environment: production"$(RESET)
	@docker-compose -f docker-compose.prod.yml up -d --build
	@echo -e $(GREEN)"Project built!"$(RESET)

restart-all:
	@echo $(GREEN)"Restarting all continars"$(RESET)
	@docker container restart app web db