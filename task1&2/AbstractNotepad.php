<?php

abstract class AbstractNotepad extends Page
{

    protected $pages = [];

    abstract public function addTextInPage($number, $value, $password);
    abstract public function reWriteTextInPage($number, $value, $password);
    abstract public function deleteTextInPage ($number, $password);
    abstract public function getInfoAboutPage($number, $password);
    abstract public function searchWordInPage($number, $word, $password);
    abstract public function containsDigitsInPage($number, $password);

}