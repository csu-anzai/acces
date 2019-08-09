# ACCES
Access Center for Community Extension Sevices

A Capstone Proposal presented to the faculty of the Department of Computer and Information Sciences of the University of San Carlos

by Bryl, Miko, Ethan, and Logan.

# How to setup:

  - Clone the repository
  - Create database 'acces'

### Installation

```sh
$ php artisan migrate:refresh --seed
$ composer update
$ php artisan serve
```

### To setup reset password functionality

Configure the following in the .env file:

    MAIL_DRIVER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=587
    MAIL_USERNAME=accessdontreply@gmail.com
    MAIL_PASSWORD=accessecret123
    MAIL_ENCRYPTION=tls