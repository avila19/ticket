<?php
namespace Database\Seeders;
use App\Department;
use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            "AGRONEGOCIOS","ASESORIA LEGAL","AUDITORIA INTERNA",
            "BIENES NACIONALES","BONO TECNOLOGICO PRODUCTIVO",
            "BONO CAFETALERO","COMPRAS Y SUMINISTROS","CONTABILIDAD",
            "CONTROL INTERNO","DESPACHO MINISTERIAL","DIGEPESCA","GERENCIA ADMINISTRATIVA",
            "GRANOS BASICOS","PRONAGRI","PRONAGRO","PRESUPUESTO","SECRETARIA GENERAL",
            "RECURSOS HUMANOS","TRANSPARENCIA","TRANSPORTE","UCI","UPEG","UAP","UNIDAD DE VIATICOS"
        ];
        foreach ($departments as $department)
            Department::create([
                'name' => $department
            ]);

    }
}
