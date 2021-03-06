<?php
/**
 * Created by PhpStorm.
 * User: sowwy
 * Date: 05.09.16
 * Time: 01:00
 */

class ElectronicSecuredNotepad  extends AbstractElectronicDevice
{
    private $password;

    public function start()
    {
            return true;
    }

    public function stop()
    {
            die;
    }

    public function isStarted($startValue, $stopValue)
    {
        if($startValue == 'true' && $stopValue == 'false') {
            echo 'The device is turned ON!'.PHP_EOL;
            return $this->start();
        }
        if($stopValue == 'true' && $startValue == 'false') {
            echo 'The device is OFF, you must turn it on first!'.PHP_EOL;
            return $this->stop();
        }
    }

    public function __construct($password)
    {
        parent::__construct($password);
        if(preg_match('^\S*(?=\S{5,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$^', $password)) {
            $this->password = $password;
            $_GET['password'] = $this->password;
        } else {
            echo 'Password must contain at least one upper case, one lower case and a number'.PHP_EOL;
        }
    }

    public function addPages($title, $password)
    {
        if(preg_match('^\S*(?=\S{5,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$^', $password)) {
            if ($password == $_GET['password']) {
                $this->pages[] = new Page($title);
            } else {
                echo 'Wrong password!' . PHP_EOL;
            }
        } echo 'Wrong password!' . PHP_EOL;
    }

    public function addTextInPage($number, $value, $password)
    {
        if(preg_match('^\S*(?=\S{5,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$^', $password)) {
            if ($password == $_GET['password']) {

                $this->pages[$number]->text[] = $value;
                echo 'Text: ' . $value . ' has been added to page: ' . $number . PHP_EOL;
            } else {
                echo 'Wrong password!' . PHP_EOL;
            }
        } echo 'Wrong password!' . PHP_EOL;
    }

    public function deleteTextInPage($number, $password)
    {
        if(preg_match('^\S*(?=\S{5,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$^', $password)) {
            if ($password == $_GET['password']) {
                $this->pages[$number]->text = parent::deleteText();
                echo 'Text on page: ' . $number . ' has been deleted' . PHP_EOL;
            } else {
                echo 'Wrong password!' . PHP_EOL;
            }
        } echo 'Wrong password!' . PHP_EOL;
    }

    public function reWriteTextInPage($number, $value, $password)
    {
        if(preg_match('^\S*(?=\S{5,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$^', $password)) {
            if ($password == $_GET['password']) {
                $this->pages[$number]->text = $value;
                echo 'Text on page: ' . $number . ' has been changed to: ' . $value . PHP_EOL;
            } else {
                echo 'Wrong password!' . PHP_EOL;
            }
        } echo 'Wrong password!' . PHP_EOL;
    }

    public function getInfoAboutPage($number, $password)
    {
        if(preg_match('^\S*(?=\S{5,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$^', $password)) {
            if ($password == $_GET['password']) {
                echo 'The title of page number: ' . $number . ' is: ' . $this->pages[$number]->title . PHP_EOL;
                echo 'The text of page number: ' . $number . ' is: ' . $this->pages[$number]->text . PHP_EOL;
            } else {
                echo 'Wrong password!' . PHP_EOL;
            }
        } echo 'Wrong password!' . PHP_EOL;

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