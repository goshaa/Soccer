<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TimeStampBehavior
 *
 * @author kukisz
 */
class TimeStampBehavior extends CActiveRecordBehavior {

    public function beforeSave($event) {
        $this->owner->date_updated = date('Y-m-d H:i:s');
        if ($this->owner->isNewRecord) {
            $this->owner->date_created = date('Y-m-d H:i:s');
        }
    }

}

?>
