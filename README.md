# This Project is developed using TALL Stack (TailwindCSS, AlpineJS, Laravel, Livewire)

## Run this project locally

- Pull Laravel/php project from git provider.
- Rename `.env.example` file to `.env`inside your project root and fill the database information.
  (windows won't let you do it, so you have to open your console cd your project root directory and run `mv .env.example .env` )
- Open the console and cd your project root directory
- Run `composer install`
- Run `npm install`
- Run `php artisan key:generate`
- Run `php artisan migrate --seed` to run migration and create the admin user.
- Run `npm run dev`
- Run `php artisan serve`
- I would suggest to configure an email testing service like Mailtrap to test "password reset" feature.

## Packages used in this project
- `laraveldaily/larastarters` - Starting auth scaffolding.
- `livewire/livewire` - Dynamic interfaces without writing JavaScript.
- `rappasoft/laravel-livewire-tables` - Dynamic and feature rich datatables.
- `barryvdh/laravel-dompdf`- Export data to PDF.

