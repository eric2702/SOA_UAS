#!/bin/bash

# Run Docker Compose for each file
docker-compose -f docker-compose.yml up -d --build
docker-compose -f client_service/docker-compose.yml up -d --build
docker-compose -f staff_service/docker-compose.yml up -d --build
docker-compose -f login_service/docker-compose.yml up -d --build
docker-compose -f order_service/docker-compose.yml up -d --build
docker-compose -f event_service/docker-compose.yml up -d --build
docker-compose -f web_ui_service/docker-compose.yml up -d --build
docker-compose -f web_ui_staff_service/docker-compose.yml up -d --build
