<?php

##########GIT Build Data##########
##
## File Changed In GIT Commit:
##
##    7.5.3-36-gea36ae7
##
##################################

class zipImportItem extends geoImportItem
{
    protected $_name = "Zip / Postal Code";
    protected $_description = "The user's Zip (Postal) Code";
    protected $_fieldGroup = self::USER_LOCATION_FIELDGROUP;

    public $displayOrder = 2;

    final protected function _cleanValue($value)
    {
        $value = addslashes(trim($value));
        return $value;
    }

    final protected function _updateDB($value, $groupId)
    {
        geoImport::$tableChanges['userdata']['zip'] = " `zip` = '{$value}' ";
        return true;
    }
}
