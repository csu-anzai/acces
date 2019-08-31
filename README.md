# ACCES
Access Center for Community Extension Sevices

A Capstone Proposal presented to the faculty of the Department of Computer and Information Sciences of the University of San Carlos

by Bryl, Miko, Ethan, and Logan.

# How to setup:

  - Clone the repository
  - Create database 'acces'

### Installation

```sh
$ php artisan migrate:fresh --seed
$ composer update
$ php artisan serve
```

### To setup reset password functionality

Configure the following in the .env file:

```sh
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=accessdontreply@gmail.com
MAIL_PASSWORD=accessecret123
MAIL_ENCRYPTION=tls
```

### To setup realtime notifications

Configure the following in the .env file:

```sh
BROADCAST_DRIVER=pusher

PUSHER_APP_ID=853424
PUSHER_APP_KEY=3e85f19a74e16a51033f
PUSHER_APP_SECRET=7371194d4107e2249fbf
PUSHER_APP_CLUSTER=ap1
```
