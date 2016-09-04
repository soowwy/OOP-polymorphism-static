<?php

class Page
{
    protected $title;
    protected $text = [];

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getText()
    {
        return $this->text;
    }

    public function addText ($value)
    {

        return $this->text = $this->text . $value;
    }

    public function deleteText ()
    {
        unset($this->text);
    }

    public function getInfo ()
    {

           echo 'The title of this page is: '.$this->title . PHP_EOL;
           echo 'The text on this page is: '.$this->text . PHP_EOL;

    }

    public function searchWord($word)
    {
        if (strpos($this->text, $word) !== false) {
            echo 'There is a word: '.$word.PHP_EOL;
        } else {
            echo 'There is NO word: '.$word.PHP_EOL;
        }
    }

    public function containsDigits()
    {
        if(is_numeric($this->text)) {
            echo 'The text contains digits!';
        } else {
            echo 'The text does not contain digits!';
        }
    }

}