<?php

defined('REG') OR die('Direct access to the forbidden page!');
//для вывода списка стран
//запрос на страны
$countries = $db->run("SELECT * FROM countries");
$numСountr = $db->num;
//записываем список стран для вывода в список
$text = '';
for ($i = 1; $i <= $numСountr; $i++) {
    $db->row();

    //отмечаем выбранную ранее страну, если ее выбирали
    if (filter_input(INPUT_POST, 'country') != null && $i == filter_input(INPUT_POST, 'country')) {
        $text .= "<option selected value='" . $db->data['id'] . " '>" . $db->data['name'] . "</option>\n";
    } else {
        $text .= "<option value='" . $db->data['id'] . " '>" . $db->data['name'] . "</option>\n";
    }
}
$db->stop();
