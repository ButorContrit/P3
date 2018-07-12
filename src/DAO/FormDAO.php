<?php
/**
 * Created by PhpStorm.
 * User: Lucile Rutkowski
 * Date: 09/07/2018
 * Time: 14:52
 */

namespace App\src\DAO;


class FormDAO extends DAO {
    private  $data;

    public $surround = 'p';

    public function __construct($data = array()) {
        $this->data = $data;
    }

    private function surround($html) {
        return "<{$this->surround}>{$html}</{$this->surround}>";
    }

    private function getValue($index) {
        return isset($this->data[$index]) ? $this->data[$index] : NULL;
    }

    public function input($name) {
        return $this->surround('<label for="' . $name .'">' . $this->getValue($name) . ': </label><input type="text" name="' . $name .'"
        value="" id="' . $name .'">');
    }

    public function textarea($name) {
        return $this->surround('<label for="' . $name .'">' . $this->getValue($name) . ': </label><textarea name="' . $name .'"
        value="" id="' . $name .'"></textarea>');
    }

    public function submit() {
        return $this->surround('<button type="submit">Envoyer</button>');
    }

} 