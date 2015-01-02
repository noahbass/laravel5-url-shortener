## laravel 5 url shortener

### .env

create a `.env` file for configuration:

```
DATABASE_URL=postgres://homestead:secret@localhost/homestead

APP_ENV=local
APP_DEBUG=true
APP_KEY=random-32-strings-key

TITLE=url shortener
REDIRECT=https://example.com/

CACHE_DRIVER=file
SESSION_DRIVER=file
```

### authentication

login: `/auth/login`

register: `/auth/register`
