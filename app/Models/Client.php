<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nombres',
        'apellidos',
        'fechaDeNacimiento',
        'cuit',
        'domicilio',
        'telefono',
        'email'
    ];

    protected function nombres(): Attribute
    {
        return new Attribute(
            set: function ($value) {
                return strtolower($value);
            },
            get: function ($value) {
                return ucfirst($value);
            }
        );
    }


    protected function apellidos(): Attribute
    {
        return new Attribute(
            set: function ($value) {
                return strtolower($value);
            },
            get: function ($value) {
                return ucfirst($value);
            }
        );
    }


    protected function fecha_de_nacimiento(): Attribute
    {
        return new Attribute(
            set: function ($value) {
                return (new Carbon($value))->format('Y-m-d');
            },
            get: function ($value) {
                return (new Carbon($value))->format('d/m/Y');
            }
        );
    }

    protected function cuit(): Attribute
    {
        return new Attribute(
            set: function ($value) {
                return $value;
            },
            get: function ($value) {
                return $value;
            }
        );
    }



    public function scopeSearchClient($query, $value){
        if ($value) {
            $query->where('nombres' , 'LIKE' , '%'.$value.'%')
            ->orWhere('apellidos' , 'LIKE' , '%'.$value.'%')
            ->orWhere('email' , 'LIKE' , '%'.$value.'%');
        }
    }

}
