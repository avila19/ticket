<?php

namespace App\Imports;

use App\Ticket;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TicketsImport implements ToModel,WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        $fecha = $row['creado'];
        $date = strtotime($fecha);
        $fecha2 = $row['actualizado'];
        $date2 = strtotime($fecha2);
        return new Ticket([
            'title'=> $row['titulo'],
            'content'=> $row['descripcion'],
            'author_name'=> $row['autor'],
            'author_phone'=> $row['telefono'],
            'author_email'=> $row['correo'],
            'created_at'=> date('Y-m-d H:i',$date),
            'updated_at'=> date('Y-m-d H:i',$date2),
            'deleted_at'=> $row['eliminado'],
            'status_id'=> $row['estado'],
            'priority_id'=> $row['prioridad'],
            'category_id'=> $row['categoria'],
            'assigned_to_user_id'=> $row['asignado'],
            'department_id'=> $row['departamento'],

        ]);
    }

    public function rules(): array
    {
        return [
            'titulo' =>['required'] ,
            'descripcion' =>['required'] ,
            'autor' =>['required'],
            'correo'=>['required'],
            'creado' =>['required'],
            'actualizado'=>['required'],
            'estado' =>['required'] ,
            'prioridad'=>['required'],
            'categoria'=>['required'],
            'asignado'=>['required'],
            'departamento'=>['required'],

        ];
    }
}
