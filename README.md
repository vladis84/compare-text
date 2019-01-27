# Compare-text
Библиотека для сравнения строк разными алгоритмами

## Пример использования
```php
$comparison = new Comparison();
        
$comparison
    ->addFilter(new SpaceFilter)
    ->addDriver(new TanimotoDriver)
;

$result = $comparison->compare('Hello', [' hello ', 'HEL']);
```

## Результат
```php
$result = [
    'tanimoto' => [
        ['percent' => ***, 'needle' => 'Hello', 'haystack' => ' hello '],
        ['percent' => ***, 'needle' => 'Hello', 'haystack' => 'HEL'],
    ],
];
```
