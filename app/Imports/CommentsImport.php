<?php

namespace App\Imports;

use App\Comment;
use Maatwebsite\Excel\Concerns\{ToModel, WithHeadingRow, WithValidation};

class CommentsImport implements ToModel, WithHeadingRow, WithValidation
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
        return new Comment([
            'comment_text'=>$row['solucion'],
            'created_at' =>date('Y-m-d H:i',$date),
            'updated_at'=>date('Y-m-d H:i',$date2),
            'ticket_id' =>$row['solicitud_id'],
            'user_id' =>$row['tecnico_ingeniero']
        ]);
    }

    public function rules(): array
    {
        return [
            'solucion'=>['required'],
            'solucion_creada' =>['required'],
            'solucion_actualizada'=>['required'],
            'solicitud_id' =>['required'],
            'tecnico_ingeniero' =>['required']
        ];
    }
}
