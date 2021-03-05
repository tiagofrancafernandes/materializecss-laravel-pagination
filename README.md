## MaterializeCSS Laravel Pagination
Laravel Pagination for https://materializecss.com

---

On Composer packagist:

https://packagist.org/packages/tiagof2/materializecss-laravel-pagination

---

### Installation
```
composer require tiagof2/materializecss-laravel-pagination
```

---

### Usage

1 - Send paginated data to the view

```php
//MyController.php
$contacts = Agenda::paginate(10);

return view('agenda.index', [
    'contacts' => $contacts,
]);
```

2 - In your view

```php
// agenda/index.blade.php
{!! with(new TiagoF2\MaterializePagination\MaterializePagination($contacts))->render() !!}

// With custom color
{!! with(new TiagoF2\MaterializePagination\MaterializePagination($contacts))->setColor('indigo lighten-2')->render() !!}
```

##### MaterializeCSS Colors:
https://materializecss.com/color.html

---

Inspired by https://github.com/PhillippOhlandt/materializecss-laravel-pagination
