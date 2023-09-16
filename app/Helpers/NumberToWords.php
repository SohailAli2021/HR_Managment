<?php

namespace App\Helpers;

class NumberToWords
{
    private static $ones = [
        1 => 'One', 2 => 'Two', 3 => 'Three', 4 => 'Four', 5 => 'Five',
        6 => 'Six', 7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
    ];

    private static $teens = [
        11 => 'Eleven', 12 => 'Twelve', 13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen', 19 => 'Nineteen',
    ];

    private static $tens = [
        10 => 'Ten', 20 => 'Twenty', 30 => 'Thirty', 40 => 'Forty', 50 => 'Fifty',
        60 => 'Sixty', 70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety',
    ];

    public static function convertToWords($number)
    {
        if ($number >= 1 && $number <= 9) {
            return self::$ones[$number];
        } elseif ($number >= 11 && $number <= 19) {
            return self::$teens[$number];
        } elseif ($number >= 20 && $number <= 99) {
            $tensDigit = floor($number / 10) * 10;
            $onesDigit = $number % 10;

            if ($onesDigit === 0) {
                return self::$tens[$tensDigit];
            } else {
                return self::$tens[$tensDigit] . '-' . self::$ones[$onesDigit];
            }
        } elseif ($number >= 100 && $number <= 999) {
            $hundreds = floor($number / 100);
            $remaining = $number % 100;

            $words = self::$ones[$hundreds] . ' Hundred';

            if ($remaining > 0) {
                $words .= ' and ' . self::convertToWords($remaining);
            }

            return $words;
        } elseif ($number >= 1000 && $number <= 99999) {
            $thousands = floor($number / 1000);
            $remaining = $number % 1000;

            $words = self::convertToWords($thousands) . ' Thousand';

            if ($remaining > 0) {
                $words .= ' ' . self::convertToWords($remaining);
            }

            return $words;
        } else {
            return 'Out of range';
        }
}
}

?>
