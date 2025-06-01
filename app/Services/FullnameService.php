<?php

namespace App\Services;

class FullnameService
{
    public function getFullname(int $probability): string
    {
        $name = fake() -> name();

        if (random_int(0, 100) <= $probability) {
            return $this -> ourruptString($name);
        }

        return $name;
    }

    private function ourruptString(string $name): string
    {
        $corruptChars = ['@', '#', '$', '%', '&', '1', '9', '!', '?'];
        $chars = mb_str_split($name);

        foreach ($chars as $index => $char) {
            if (random_int(0, 4) === random_int(0, 2) && $char !== ' ') {
                $chars[$index] = $corruptChars[array_rand($corruptChars)];
            }
        }

        return implode($chars);
    }
}
