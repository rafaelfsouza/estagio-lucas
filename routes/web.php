<?php

// Rotas Front
Route::name('front.')->group(function(){
    Route::get('/', 'FrontController@index')->name('index');
});

// Rotas Cron
Route::get('/cron/gerar-fatura', 'CronController@gerarFatura');
