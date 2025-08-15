#!/bin/bash

echo "Building Docker image..."
sudo docker build . -t oneapp

echo "Stopping existing container..."
docker stop ditbang-apps || true

echo "Removing existing container..."
docker rm ditbang-apps || true

echo "Running new container..."
docker run -p 80:80 -d --name ditbang-apps oneapp

echo "Deployment complete!"
