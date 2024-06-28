<?php

namespace App\Libraries;

use Faker\Provider\Base;

class IndonesianPhoneNumberProvider extends Base {
    protected static $formats = [
        '081# #### ####',
        '082# #### ####',
        '083# #### ####',
        '084# #### ####',
        '085# #### ####',
        '086# #### ####',
        '087# #### ####',
        '088# #### ####',
        '089# #### ####',
    ];

    public function indonesianPhoneNumber() {
        $format = static::randomElement(static::$formats);
        return self::numerify($format);
    }
}



