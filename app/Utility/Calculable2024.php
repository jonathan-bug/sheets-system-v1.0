<?php

namespace App\Utility;

use App\Utility\Strategy\Calculable;
use App\Utility\Configurable2024;
use Illuminate\Support\Carbon;
use App\Models\Employee;

class Calculable2024 extends Calculable {
    public function __construct() {
        $this->configuration = new Configurable2024();
    }
}


?>
