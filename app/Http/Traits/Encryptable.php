<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\Crypt;

trait Encryptable
{
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (in_array($key, $this->encryptable)) {
            $value = empty($value) ? null : Crypt::decrypt($value);
        }

        return $value;
    }

    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encryptable)) {
            $value = empty($value) ? null : Crypt::encrypt($value);
        }

        return parent::setAttribute($key, $value);
    }
}
