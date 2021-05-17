<?php
use Illuminate\Support\Facades\Route;

Route::get('group/get_select2',function(){
    return Me::get_select2("");
})->name('group_select2');