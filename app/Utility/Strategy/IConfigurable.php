<?php

namespace App\Utility\Strategy;

interface IConfigurable {
    public function performCalculation($values);
    public function updateCalculable($values);
}

?>
