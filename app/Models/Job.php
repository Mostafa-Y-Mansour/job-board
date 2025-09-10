<?php

namespace App\Models;

class Job
{
    public static function all() {
        // it will return all jobs to the controller
        return [
            ["title" => "Software Engineer", "salary" => "$1000"],
            ["title" => "Graphic Designer", "salary" => "$2000"]
        ];
    }
}
