<?php
/**
 * Created by PhpStorm.
 * User: Lucile Rutkowski
 * Date: 09/07/2018
 * Time: 14:52
 */

namespace App\src\DAO;


class FormDAO {
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
        return $this->surround('<input type="text" name="' . $name .'" value="' . $this->getValue($name) . '"
        >');
    }

    public function textarea($name) {
        return $this->surround('<textarea name="' . $name .'" value="">' . $this->getValue($name) . '</textarea>');
    }

    public function submit() {
        return $this->surround('<button type="submit">Envoyer</button>');
    }

} 