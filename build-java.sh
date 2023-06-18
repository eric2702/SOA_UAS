#!/bin/bash

# Build each *_svc and *_cons project
cd client_service
cd client_svc
./mvnw clean package -DskipTests
cd ../client_cons
./mvnw clean package -DskipTests
cd ../../

cd staff_service
cd staff_svc
./mvnw clean package -DskipTests
cd ../staff_cons
./mvnw clean package -DskipTests
cd ../../

cd login_service
cd login_svc
./mvnw clean package -DskipTests
cd ../login_cons
./mvnw clean package -DskipTests
cd ../../

cd order_service
cd order_svc
./mvnw clean package -DskipTests
cd ../order_cons
./mvnw clean package -DskipTests
cd ../../

cd event_service
cd event_svc
./mvnw clean package -DskipTests
cd ../event_cons
./mvnw clean package -DskipTests
cd ../../
