<?php

namespace Core;

class Validator
{
    public static function required($fields, $data)
    {
        $missing = [];
        foreach ($fields as $field) {
            if (empty($data[$field])) {
                $missing[] = $field;
            }
        }
        return $missing;
    }

    public static function email($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function minLength($value, $length)
    {
        return mb_strlen($value) >= $length;
    }

    public static function maxLength($value, $length)
    {
        return mb_strlen($value) <= $length;
    }
}
