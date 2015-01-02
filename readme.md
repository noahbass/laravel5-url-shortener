## laravel 5 url shortener [![Build Status](https://travis-ci.org/noahbass/laravel5-url-shortener.svg?branch=develop)](https://travis-ci.org/noahbass/laravel5-url-shortener)

A sample laravel 5 app.

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

### testing

Tests are in `/tests/`. Run them with `vendor/bin/phpunit`.

### panel and authentication

admin panel: `/panel`

login: `/auth/login`

register: `/auth/register`
