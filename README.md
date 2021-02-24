## Laravel + Sanctum

It is demo project for demonstrating the RESTfull api with laravel and sanctum and use scribe to create the api documentaion.

## How to use

- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate --seed__ (it has some seeded data for your testing)
- Go to the http://127.0.0.1:8000/docs url to check api documentaion and to get the postman collection.