<?php
namespace App\Business;


use Illuminate\Database\Eloquent\Model;

/**
* Class Cartao
* @package App\Business
*/
class ExcelFile extends Model {

    public function create($filename)
    {
        $file = new ExcelFile();
        $file->name = $filename;
        $file->save();

        return $file;
    }

}
