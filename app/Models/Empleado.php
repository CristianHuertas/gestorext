<?php   
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model{
    protected $table = "empleados";

    protected $fillable = [

        'empl_id',
        'empl_documento',
        'empl_nombres',
        'empl_apellidos',
        'empl_cargo',
        'empl_salario',
        'empl_correo',
        'empl_fecha_ingeso',
        'empl_estado'

    ];

    // protected $hidden = [];




    // public $timestamps = false;
}