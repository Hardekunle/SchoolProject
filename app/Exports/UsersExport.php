<?php

namespace App\Exports;

use App\Student;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection, withHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::all();
    }
    /**
    * @return array
    * /

      public function headings():array{
           return[
               '#',
               'firstname',
               'registration No',
               'Firstname',
               'middlename',
               'lastname',
               'student email',
               'gender',
               'Date of Birth',
               'student Phone',
               'fathername',
               '#',
               'firstname',
               'registration No',
               'Firstname',
               'middlename',
               'lastname',
               'student email',
               'gender',
               'Date of Birth',
               'student Phone',
               'fathername',
               'Date of Birth',
               'student Phone',
               'fathername',
           ];
      }
}

