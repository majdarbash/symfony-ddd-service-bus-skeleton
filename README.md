# Symfony DDD Skeleton with Service Buses
This skeleton utilizes service buses including command bus, query bus and event bus and provides a sample mini-application to demonstrate the proposed software architecture.
    
Features include:
* REST APIs
    * API for User registration
    * API for retrieving User details
* Service Buses utilization through [Symfony's Messenger Component](https://github.com/symfony/messenger)
    * Command Bus
    * Query Bus
    * Event Bus
* CQRS Pattern
* RabbitMQ Integration
    * Asynchronous processing of queued Messages


## Install and Launch
Starting the project can be done very simply through using this command:
```
docker-compose up -d
```

This project uses built-in php simple server, and the application can be accessed through:
```
http://127.0.0.1:81
```

RabbitMQ Management Console can be accessed through
```
http://1270.0.0.1:15672
```

## Uninstall
```
docker-compose down
```