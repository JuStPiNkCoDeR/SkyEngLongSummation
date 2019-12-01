<?php

class LongSummation
{
    private $smallest, $other;

    public function __construct(string $a, string $b)
    {
        $revA = strrev($a);
        $revB = strrev($b);
        $this->smallest = (strlen($a) < strlen($b)) ? $revA : $revB;
        $this->other = ($this->smallest == $revA) ? $revB : $revA;
    }

    public function sum(): string
    {
        $result = [];
        $isReminderExist = false;

        $i = 0;
        for (; $i < strlen($this->smallest); $i++)
        {
            $a = $this->smallest[$i];
            $b = $this->other[$i];

            $sum = (int) ($a) + (int) ($b);

            if ($isReminderExist) $sum++;

            if ($sum < 10)
            {
                $result[$i] = (string) $sum;
                $isReminderExist = false;
            }
            else
            {
                $result[$i] = (string) $sum % 10;
                $isReminderExist = true;
            }
        }

        for (; $i < strlen($this->other); $i++)
        {
            if ($isReminderExist)
            {
                $result[$i] = (string) ((int) $this->other[$i] + 1);
                $isReminderExist = false;
            }
            else
            {
                $result[$i] = $this->other[$i];
            }
        }

        return strrev(join($result));
    }
}

$summator = new LongSummation(
    "781864351816654864655145164891651984318465184531684311684131616168351681513218798465213",
    "84948489453184654987894981567165265415674715674178197148971765419871657487489715764175614781765198754879167548781789" );
echo $summator->sum();