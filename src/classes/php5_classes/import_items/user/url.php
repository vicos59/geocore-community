<?php

##########GIT Build Data##########
##
## File Changed In GIT Commit:
##
##    7.5.3-36-gea36ae7
##
##################################

class urlImportItem extends geoImportItem
{
    protected $_name = "URL";
    protected $_description = "URL of the user's website";
    protected $_fieldGroup = self::USER_GENERAL_FIELDGROUP;

    public $displayOrder = 9;

    final protected function _cleanValue($value)
    {
        $value = addslashes(trim($value));
        return $value;
    }

    final protected function _updateDB($value, $groupId)
    {
        geoImport::$tableChanges['userdata']['url'] = " `url` = '{$value}' ";
        return true;
    }
}
