<?php

namespace App;

use App;
use Emadadly\LaravelUuid\Uuids;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Client
 *
 * @property-read mixed $full_name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Client uuid($uuid, $first = true)
 * @mixin \Eloquent
 */
class Client extends Model
{
    use Uuids {
        boot as protected uuid_boot;
    }
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    //Permite formatear fechas
    protected $dates = ['fechanacimiento'];

    //
    protected $fillable = [
        'nombre',
        'apellidos',
        'nif',
        'direccion',
        'codigopostal',
        'localidad',
        'provincia',
        'fechanacimiento',
        'telefono1',
        'telefono2',
        'movil',
        'email',
        'iban',
        'nota',
        'user',
    ];
    protected $primaryKey='id';


    /**
     *Acciones que realiza cuando ocurre ciertos eventos
     *
     */

    protected static function boot(){
        parent::boot();
        self::uuid_boot();

        static::creating(function($cliente){
            if ( !App::runningInConsole()){
                $cliente->user=auth()->id();


            }
        });

    }



    public function users()
    {
        $this->belongsTo(User::class, 'id', 'user');
    }

    public function getFullNameAttribute()
    {
        return $this->nombre.' '.$this->apellidos;
    }


}