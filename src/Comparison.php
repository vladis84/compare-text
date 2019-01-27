<?php

use Driver\CompareDriverInterface;
use Filter\FilterInterface;

class Comparison
{
    /**
     * @var FilterInterface[]
     */
    private $filters = [];

    /**
     * @var CompareDriverInterface[]
     */
    private $drivers = [];

    public function compare(string $needle, array $haystack)
    {
        // Фильтрация строк
        foreach ($this->filters as $filter) {
            $normalizedNeedle   = $filter->filter($needle);
            $normalizedHaystack = array_map([$filter, 'filter'], $haystack);
        }

        $result = [];

        // Сравниваем
        foreach ($this->drivers as $driver) {
            $driverName = $driver->getDriverName();
            $result[$driverName] = [];

            foreach ($normalizedHaystack as $key => $value) {
                $percent = $driver->compare($normalizedNeedle, $value);
                $result[$driverName][] = ['percent' => $percent, 'needle' => $needle, 'haystack' => $haystack[$key]];
            }
        }

        // Отдаем результат
        return $result;
    }

    /**
     * @param FilterInterface $filter
     *
     * @return $this
     */
    public function addFilter(FilterInterface $filter)
    {
        $this->filters[] = $filter;

        return $this;
    }

    /**
     * @param CompareDriverInterface $driver
     *
     * @return $this
     */
    public function addDriver(CompareDriverInterface $driver)
    {
        $this->drivers[] = $driver;

        return $this;
    }
}
