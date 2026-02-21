<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    /* Eloquen es un ORM (Object Relational Mapper) que nos permite interactuar con la base de datos,
    *  utilizando clases y objetos en lugar de escribir consultas SQL directamente.
    *  Eloquent guarded vacio para que se puedan llenar todos los campos de forma masiva
    */
    protected $guarded = [];
}
