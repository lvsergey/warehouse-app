<?php

namespace App\Model;

class PriceCalculator
{
    public function calculate(array $data)
    {
        $result = 0;
        foreach ($data as $t => $batch) {
            foreach ($batch as $item) {
                switch ($t) {
                    case 'sum':
                        $result += $item['p'] * $item['q'];
                        break;
                    case 'disc':
                        $result += $item['p'] * $item['q'] * $item['d'] / 100;
                        break;
                    default:
                        return false;
                }
            }
        }
        return $result;
    }

    public function add(array &$data, $type, $name, array $new)
    {
        if (!isset($data[$type])) {
            $data[$type] = [];
        }

        foreach ($data as $t => &$batch) {
            if ($t === $type) {
                $f = false;
                foreach ($batch as $item => &$value) {
                    switch ($t) {
                        case 'sum':
                            if ($item === $name) {
                                $value['q'] += $new['q'];
                                $f = true;
                                break 2;
                            }
                            break;
                        case 'dis':
                            if ($item === $name && $value['d'] === $new['d']) {
                                $value['q'] += $new['q'];
                                $f = true;
                                break 2;
                            }
                            break;
                        default:
                            return;
                    }
                }
                if (!$f) {
                    $batch[$name] = $new;
                }
            }
        }
    }
}