<?php

class Comparison
{
    public function compare(string $needle, array $haystack)
    {
        // Нормализация строк
        $normalizedNeedle   = NormalizeHelper::normalize($needle);
        $normalizedHaystack = array_map('NormalizeHelper::normalize', $haystack);

        // Создаем драйверы для сравнения
        /* @var \Driver\CompareDriver[] $drivers */
        $drivers = [
            new  \Driver\MetaphoneDriver(),
            new  \Driver\TanimotoDriver(),
            new  \Driver\SimilarTextDriver(),
        ];

        // Сравниваем
        foreach ($drivers as $driver) {
            foreach ($normalizedHaystack as $value) {
                $percent = $driver->compare($normalizedNeedle, $value);
            }
        }
        // Отдаем результат
    }
}
