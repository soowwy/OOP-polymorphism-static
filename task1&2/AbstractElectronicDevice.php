<?php
/**
 * Created by PhpStorm.
 * User: sowwy
 * Date: 05.09.16
 * Time: 00:55
 */

abstract class AbstractElectronicDevice extends AbstractNotepad
{
    abstract public function start();
    abstract public function stop();
    abstract public function isStarted($startValue, $stopValue);
}