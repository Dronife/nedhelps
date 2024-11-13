<?php

declare(strict_types=1);

namespace App\Http\Shared;

use Illuminate\Support\Str;

trait KeyTrait
{
    public function toSnakeCase(array $array): array
    {
        $result = [];

        foreach ($array as $key => $value) {
            $newKey = Str::snake($key);
            $result[$newKey] = $value;
        }

        return $result;
    }
}
