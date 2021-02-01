# API Spec

## Prerequiste

- Composer ([Composer](https://getcomposer.org/download/))
- Postman - Download and Install ([Postman](https://www.getpostman.com/))

---

## Installation

### Clone

---

- Import DB article-service.sql

```bash
$ git clone https://github.com/reihnagm/Slim-v3-Article-Service.git
$ cd Slim-v3-Article-Service
$ composer install
```

---

### Start Development Server

```bash
$ composer run start --timeout=0
```

---

## All Article

Request :

- Method : GET
- Endpoint : `http://localhost:8080/api/articles?page=1&search=judul arti&sort=newer&sortBy=title&show=5`
- Params :

```json
{
  "page": 1,
  "search": "judul artikel",
  "sort": "newer",
  "sortBy": "title",
  "show": 5
}
```

Response :

```json
{
  "status": 200,
  "error": false,
  "message": "Ok.",
  "results": {
    "articles": [
      {
        "uid": "826c402f-8c8f-444f-b56f-db60fafafcc6",
        "title": "judul artikel pertama",
        "body": "body pertama",
        "image": "http://localhost:8080/assets/images/news.png",
        "user_uid": "ffeab53d-a1c4-405b-b114-95afce4eb8e9",
        "event_uid": "97404f1b-a63a-4004-be4e-10db5e1b22cc",
        "created_at": "2021-01-29 14:43:08",
        "updated_at": "2021-01-29 14:43:08",
        "user": {
          "uid": "ffeab53d-a1c4-405b-b114-95afce4eb8e9",
          "name": "Reihan Agam",
          "email": "reihanagam7@gmail.com"
        },
        "event": {
          "uid": "97404f1b-a63a-4004-be4e-10db5e1b22cc",
          "name": "news"
        },
        "tags": [
          {
            "uid": "dde26d8b-f67d-4f78-9293-950f35f7de2e",
            "name": "fun"
          }
        ]
      }
    ],
    "perPage": 1,
    "nextPage": 2,
    "prevPage": 0,
    "nextUrl": "http://localhost:8080/api/articles?page=1&search=judul%20arti&sort=newer&sortBy=title&show=5?page=2",
    "prevUrl": "http://localhost:8080/api/articles?page=1&search=judul%20arti&sort=newer&sortBy=title&show=5?page=0",
    "total": 1
  }
}
```

## Store Article

Request :

- Method : POST
- Endpoint : `http://localhost:8080/api/articles`
- Body :

```json
{
  "title": "judul artikel pertama",
  "body": "body pertama",
  "tags": ["ee7bf590-094a-49b8-8c26-4b3c31a758a6", "dde26d8b-f67d-4f78-9293-950f35f7de2e"],
  "user_uid": "ffeab53d-a1c4-405b-b114-95afce4eb8e9",
  "event_uid": "97404f1b-a63a-4004-be4e-10db5e1b22cc"
}
```

Response :

```json
{
  "status": 201,
  "error": false,
  "message": "Ok.",
  "results": []
}
```

## Update Article

Request :

- Method : PUT
- Endpoint : `http://localhost:8080/api/articles/ee39bb72-9d66-4643-9688-93f86aecdd92`
- Params :

```json
{
  "uid": "ee39bb72-9d66-4643-9688-93f86aecdd92"
}
```

- Body :

```json
{
  "title": "text berubah",
  "body": "body berubah",
  "tags": ["aa47a3e2-95d9-4b74-a75a-4aecc8ea89ec", "dde26d8b-f67d-4f78-9293-950f35f7de2e"],
  "event_uid": "8dc1dadb-95c8-44a9-8dbd-0efd6bc60de8"
}
```

Response :

```json
{
  "status": 200,
  "error": false,
  "message": "Ok.",
  "results": []
}
```

## Destroy Article

Request :

- Method : DELETE
- Endpoint : `http://localhost:8080/api/articles/ee39bb72-9d66-4643-9688-93f86aecdd92`
- Params :

```json
{
  "uid": "ee39bb72-9d66-4643-9688-93f86aecdd92"
}
```

- Body :

```json
{
  "tags": ["aa47a3e2-95d9-4b74-a75a-4aecc8ea89ec", "dde26d8b-f67d-4f78-9293-950f35f7de2e"]
}
```

Response :

```json
{
  "status": 200,
  "error": false,
  "message": "Ok.",
  "results": []
}
```
