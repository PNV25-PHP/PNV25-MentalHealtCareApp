<?php

namespace App\Repositories;

use App\Models\Doctor;
use Illuminate\Support\Facades\DB;
class NewRepository{
    private string $tableName = "news";
    public function selectAll()
    {
        $news = DB::select("SELECT * FROM news");
        return $news;
    }
}