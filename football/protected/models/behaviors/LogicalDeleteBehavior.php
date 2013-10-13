<?php
/**
 * A delete helyett legikai törlést csinál.
 * És a findAll is felüldeffiniálja, hogy csak a logikailag nem
 * törölt elemeket adja vissza.
 *
 * Fontos, hogy a táblának legyen deleted oszlopa, mert törléskor ezt
 * állítja be
 */
class LogicalDeleteBehavior extends CActiveRecordBehavior
{
    
    /**
     * Logikai törlés
     * 
     * @param CEvent $event event parameter
     * 
     * @return void
     */
    public function beforeDelete($event)
    {
        $this->owner->deleted = 1;
        $this->owner->save();

        $event->isValid = false;
    }

    /**
     * Csak a logikaileg nem törölt elemeket adja vissza.
     *
     * @param CEvent $event event parameter
     *
     * @return void
     */
    public function beforeFind($event)
    {
        $this->owner->getDbCriteria()->mergeWith(
            array(
                 'condition' => 't.deleted = 0',
             )
        );
    }

}