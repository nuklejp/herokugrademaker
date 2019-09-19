<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class grade extends Model
{
    protected $guarded = array('id');
    //
    public static $rules = array(
        'name' => 'required',
        'test' => 'required',
        'homework' => 'required',
        'expression' => 'required',
        'pronunciation' => 'required',
        'writing' => 'required',
    );



    public function judgeGrade($judge){
      $name = $judge["name"];
      unset($judge["name"]);
      unset($judge["_token"]);

      $grade = 0;
      foreach($judge as $j){
        if($j == "A"){
          $grade+=3;
        }elseif($j == "B"){
          $grade+=2;
        }elseif($j == "C"){
          $grade+=1;
        }
      }

      $point = 0;
      if($grade >= 15){
        $point = 5;
      }elseif($grade >= 13 && $grade < 15){
        $point = 4;
      }elseif($grade >= 8 && $grade < 13){
        $point = 3;
      }elseif($grade >= 6 && $grade < 8){
        $point = 2;
      }elseif($grade < 6){
        $point = 1;
      }



      $judge["finalgrade"] = $point;
      $judge["name"] = $name;

      // データベースに保存する
      return $judge;
    }
}
