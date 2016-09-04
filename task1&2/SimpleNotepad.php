<?php

class SimpleNotepad extends AbstractNotepad
{

    public function __construct()
    {

    }

    public function addPages($title)
    {
        $this->pages[] = new Page($title);
    }


    public function addTextInPage($number, $value, $password = null)
    {
        $this->pages[$number]->text[] = $value;
        echo 'Text: '.$value.' has been added to page: '.$number.PHP_EOL;
    }

    public function deleteTextInPage($number, $password = null)
    {
        $this->pages[$number]->text = parent::deleteText();
        echo 'Text on page: '.$number.' has been deleted'.PHP_EOL;
    }

    public function reWriteTextInPage($number, $value, $password = null)
    {
        $this->pages[$number]->text = $value;
        echo 'Text on page: '.$number.' has been changed to: '.$value.PHP_EOL;
    }

    public function getInfoAboutPage($number, $password = null)
    {

          echo 'The title of page number: '.$number. ' is: '.$this->pages[$number]->title . PHP_EOL;
          echo 'The text of page number: '.$number.' is: '.$this->pages[$number]->text . PHP_EOL;

    }


    public function searchWordInPage($number, $word, $password = null)
    {
        if (strpos($this->pages[$number]->text, $word) !== false) {
            echo 'There is a word: '.$word.' on page: '.$number.PHP_EOL;
        } else {
            echo 'There is NO word: '.$word.' on page: '.$number.PHP_EOL;
        }
    }

    public function containsDigitsInPage($number, $password = null)
    {
        for($i = 0; $i < count($this->pages[$number]->text); $i++) {
            if (is_numeric($this->pages[$number]->text[$i])) {
                echo 'The text contains at least on digit!';
            } else {
                echo 'The text does not contain digits!';
            }
        }
    }
}