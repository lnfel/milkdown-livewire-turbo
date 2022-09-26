## Laravel Livewire and Turbolinks

This is a sample implementation of [Milkdown](https://milkdown.dev) using [Laravel Livewire](https://laravel-livewire.com/) and [Turbolinks](https://github.com/turbolinks/turbolinks)

### Getting Started

1. Clone this repo
```sh
git clone https://github.com/lnfel/milkdown-livewire-turbo.git
```

2. CD into the project
```sh
cd milkdown-livewire-turbo
```

3. Make `.env` file at the root of the project and copy paste `.env.example` contents to it.

4. Install composer dependencies
```sh
composer install
```

5. Install npm packages
```sh
npm install
```

6. Fire up artisan server
```sh
php artisan serve
```

7. Visit site at `http://127.0.0.1:8000` or `http://localhost:8000/`

  > Run `npm run watch --verbose` when updating files

### Notable files to check
- `resources/js/app.js`, here is the initialization of milkdown and turbolinks
- `resources/views/components/milkdown.blade.php`, plain javascript implementation for multiple instances of milkdown editor using [laravel anonymous blade component](https://laravel.com/docs/9.x/blade#anonymous-components)
- `resources/views/components/modal.blade.php`, sample modal (technically just a dropdown atm but same principle also applies for actual modal component). An anonymous component where we reuse `milkdown` component
- `resources/views/layouts/main.blade.php`, simple parent layout
- `resources/views/livewire/`, here are livewire fullpage components where we use `milkdown` and `modal` components
- `app/Http/Livewire`, livewire controllers are here. `SampleController` handles `/` route and `AnotherController` handles `/edit` route.
