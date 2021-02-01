# API Spec

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
}
```
