<?php

namespace App\Exports;

use App\Model\Student;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::all();
    }
}
