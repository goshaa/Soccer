<?php

class Clubs extends BaseClubs
{
    public function behaviors()
    {
        return array(
            'TimestampBehavior',
            'LogicalDeleteBehavior',
        );
    }
}