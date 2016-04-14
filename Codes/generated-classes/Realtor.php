<?php

use Base\Realtor as BaseRealtor;

/**
 * Skeleton subclass for representing a row from the 'realtor' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Realtor extends BaseRealtor
{
    public function toReadableArray(){
        return [
            'id'        => $this->getId(),
            'username'  => $this->getUsername(),
            'role'      => HdbCore::ROLE_REALTOR
        ];
    }
}
