<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
//    function connect()
//    {
//        $connect = mysqli_connect('localhost', 'root', '', 'products');
//        if (!$connect) die(mysqli_connect_error());
//        mysqli_set_charset($connect, "utf8");
//    }

    use HasFactory, Notifiable;

    protected $fillable = ['name', 'cost', 'price', 'group'];
}
