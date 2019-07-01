<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarantula extends Model
{
    //
    public $fillable = ['common_name', 'scientific_name', 'size', 'price', 'gender', 'classification', 'image_url' ];

    public function url(){
    	return $this->id ? 'tarantulas.update' : 'tarantulas.store';
    }

    public function method(){
    	return $this->id ? 'PUT' : 'POST';
    }

    public function getGender(){
    	return $this->gender == 'S' ? 'Sin Sexar' : $this->gender == 'H' ? 'Hembra' : 'Macho';
    }

    public function getClass(){
    	return $this->gender == 'L' ? 'Ling' : $this->gender == 'J' ? 'Juvenil' : 'Adulto(a)';
    }

    public function getPrice(){
    	return '$'.number_format($this->price, 0, '', ',');
    }
}
