<?php

namespace App\Models;

use CodeIgniter\Model;

class AnimalModelo extends Model
{
    protected $table      = 'animal';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'nombre', 'edad', 'tipo', 'descripcion', 'comida'];
}