# Votación: Aplicación simple en PHP con Docker y docker-compose

## Requisitos

* [Docker 1.12](https://docs.docker.com/engine/installation/) o superior
* [docker-compose](https://github.com/docker/compose) 1.9.0 o superior

## Instrucciones

Clona la aplicación y dentro del directorio ejecuta:

	$ docker-compose up

La aplicación correrá en [http://localhost:3000/](http://localhost:3000)

## Arquitectura
![](diagram.png)

* Una aplicación PHP 7 que te permite votar por Aurora o Wilstermann.
* Una base de datos Redis que guarda los votos por ambos participantes.
