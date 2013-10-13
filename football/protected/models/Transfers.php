<?php

class Transfers extends BaseTransfers
{
	public function behaviors()
    {
        return array(
            'TimestampBehavior',
        );
    }
}