<?php

require_once 'autoload.php';


echo 'SimpleNotePad: '.PHP_EOL;
$simpleNotePad = new SimpleNotepad();

$simpleNotePad->addPages('First');
$simpleNotePad->addPages('Second');
$simpleNotePad->addPages('Third');


$simpleNotePad->addTextInPage(1, 'badger badger badger snaaaake');
$simpleNotePad->addTextInPage(2, 'dwarf dwarf dwarf');

$simpleNotePad->deleteTextInPage(1);

$simpleNotePad->reWriteTextInPage(2, '2elf elf elf');
$simpleNotePad->getInfoAboutPage(2);

$simpleNotePad->searchWordInPage(2, 'elf');
$simpleNotePad->containsDigitsInPage(2);

echo PHP_EOL;
echo 'SecuredNotePad: '.PHP_EOL;
$securedNotePad = new SecuredNotepad('dota');

$securedNotePad->addPages('First', 'dota');
$securedNotePad->addPages('Second', 'dota');
$securedNotePad->addPages('Third', 'dota');

$securedNotePad->addTextInPage(1, 'test test test', 'dota');
$securedNotePad->addTextInPage(2, 'bla bla bla', 'dota');

$securedNotePad->deleteTextInPage(1, 'dota');
$securedNotePad->deleteTextInPage(2, 'asd');

$securedNotePad->reWriteTextInPage(1, 'badger badger', 'dota');

$securedNotePad->getInfoAboutPage(1, 'dota');

echo PHP_EOL;

echo 'ElectronicSecuredNotepad: '.PHP_EOL;

$elSecured = new ElectronicSecuredNotepad('Qwerty1');

        // първият параметър на isStarted(), сочи - start(), а вторият - stop(), единият трябва да е true;
$elSecured->isStarted('true', 'false');
$elSecured->addPages('First', 'Qwerty1');
$elSecured->addPages('Second', 'pass');
$elSecured->addPages('Third', 'Qwerty1');

$elSecured->addTextInPage(1, 'test test test', 'asd');
$elSecured->addTextInPage(2, 'bla bla bla', 'Qwerty1');

$elSecured->deleteTextInPage(2, 'Qwerty1');

$elSecured->reWriteTextInPage(1, 'badger badger', 'Qwerty1');

$elSecured->getInfoAboutPage(1, 'Qwerty1');