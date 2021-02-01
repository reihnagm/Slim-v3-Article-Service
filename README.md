# API Spec

Request :

- Method : GET
- Endpoint : `http://localhost:8080/api/articles`
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
  "data": {
    "token": "abcdef"
  }
}
```
