# morecop-assessment

## Setup

To build the docker images change directory into the docker folder and run command

```

docker-compose up --build

```

Docker will download all needed files and will build PHP-FPM, Nginx, PostgreSQL images 

To run the application, inside docker directory run the command in your terminal

```

docker-compose up -d

```

The web server is exposed on port 8080 on your local machine. So to access it you have to go to the url: http://127.0.0.1:8080 in your browser


To add a OAuth 2 Client, from the docker directory run command

```
docker-compose run php bin/console trikoder:oauth2:create-client client_id client_secret --grant-type "client_credentials"

```

To update a OAuth 2 Client, from the docker directory run command

```
docker-compose run php bin/console trikoder:oauth2:update-client --redirect-uri "http://127.0.0.1:8080/authorize" client_id

```

## Testing the client credentials grant token

```
curl -X "POST" "http://localhost:8080/token" \
        -H "Content-Type: application/x-www-form-urlencoded" \
        -H "Accept: 1.0" \
        --data-urlencode "grant_type=client_credentials" \
        --data-urlencode "client_id=client_id" \
        --data-urlencode "client_secret=client_secret" \
```

To refresh a OAuth 2 Client token, from the docker directory run command

```
docker-compose run php bin/console trikoder:oauth2:clear-expired-tokens –refresh-tokens

```