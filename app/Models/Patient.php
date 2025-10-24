<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    /** @use HasFactory<\Database\Factories\PatientFactory> */
    use HasFactory;
    protected $fillable = [
        'patientcode',
        'firstname',
        'middlename',
        'lastname',
        'sex',
        'birthdate',
        'contactnumber',
        'email',
        'address',
        'bloodtype',
        'allergies',
        'emergencycontactname',
        'emergencycontactnumber',
    ];
}
