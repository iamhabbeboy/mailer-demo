## Mailerlite demo

- Clone the repository 
- Install packages with the following:
```bash
composer install 
npm install
npm run dev 
```
Also, you might need to run `npm run build` to generate ziggy url that maps Laravel routes with Vue, this is due to inertiajs framework that was used. 
  - Create a `database.sqlite` and `testing.sqlite` in `database/` folder and set the relative path in the `.env`
```bash
DB_DATABASE=<path>/database/database.sqlite
```

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

### Technology Used
Instead of using Vue as instructed, [Inertia](https://inertiajs.com/) was chosen because it makes dealing with Vue much simpler and also been supported largely by the Laravel ecosystem.
- Inertia(Vue)
- Laravel

### Preview
![screenshot](https://res.cloudinary.com/denj7z5ec/image/upload/v1674125809/ezgif.com-gif-maker_3_oaxxm1.gif)

### Preview Video
[click to watch preview video](https://res.cloudinary.com/denj7z5ec/video/upload/v1674125918/Screen_Recording_2023-01-19_at_11.48.33_AM_fr0ddn.mov)
