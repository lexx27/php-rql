<?php

namespace r\Datum;

use r\Datum\Datum;
use r\Exceptions\RqlDriverError;

class NumberDatum extends Datum
{
    public function encodeServerRequest()
    {
        return $this->getValue();
    }

    public static function decodeServerResponse($json)
    {
        $result = new NumberDatum();
        $result->setValue($json);
        return $result;
    }

    public function setValue($val)
    {
        if (!is_numeric($val)) {
            throw new RqlDriverError("Not a number: " . $val);
        }
        parent::setValue($val);
    }
}
