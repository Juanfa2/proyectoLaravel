<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
  public $table = "preguntas";
  public $primaryKey = "idPregunta";
  public $timestamps = false;
  public $guarded = [];
}
