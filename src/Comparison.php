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
            new  \Driver\StringEqualsDriver(),
            new  \Driver\MetaphoneDriver(),
            new  \Driver\TanimotoDriver(),
            new  \Driver\SimilarTextDriver(),
        ];

        $result = [];

        // Сравниваем
        foreach ($drivers as $driver) {
            $driverName = preg_replace('/.+(\w+)$/iU', '$1', get_class($driver));
            $result[$driverName] = [];

            foreach ($normalizedHaystack as $key => $value) {
                $percent = $driver->compare($normalizedNeedle, $value);
                $result[$driverName][] = ['percent' => $percent, 'needle' => $needle, $haystack[$key]];
            }
        }

        // Отдаем результат
        return $result;
    }
}
