<?php

namespace VannessPlus;

use Illuminate\Database\Eloquent\Model;
class Profile extends Model{

    public $timestamps = false;
    protected $table = 'file';
   


public static function insert_vanness_db($data)
    {
        $profiles = Profile::all();
                                 
// แสดงข้อมูล
foreach ($profiles as $recode){
    echo $recode->file_id;
    echo $recode->first_name;
    echo $recode->last_name;
}
 
 
$insert = DB::table('file')->insert($data);
 
 
    }

}