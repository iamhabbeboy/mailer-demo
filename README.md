## Mailerlite demo

- Clone the repository 
- Create a `database.sqlite` in `database/` folder in case it's not found in this repository.
- Run Migration with 
```bash
 php artisan migrate
 php artisan db:seed
```
- Run Migration for Testing
```bash
 php artisan migrate --env=testing
 php artisan db:seed --env=testing
```
- Start the server 
```
 php artisan serve
```

### Screenshot
2
