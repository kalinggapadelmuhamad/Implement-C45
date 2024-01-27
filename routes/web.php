<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $c45 = new Algorithm\C45();
    $input = new Algorithm\C45\DataInput;
    $data = array(
        array(
            "Ranking Semester 4" => "1",
            "Ranking Semester 5" => "1",
            "Ranking Semester 6" => "1",
            "Nilai Ujian Nasional (Rata-Rata)" => "0",
            "Status Ayah" => "Masih Hidup",
            "Kelas Keputusan" => "Yes"
        ),
        array(
            "Ranking Semester 4" => "3",
            "Ranking Semester 5" => "3",
            "Ranking Semester 6" => "3",
            "Nilai Ujian Nasional (Rata-Rata)" => "84",
            "Status Ayah" => "Masih Hidup",
            "Kelas Keputusan" => "Yes"
        ),
        array(
            "Ranking Semester 4" => "3",
            "Ranking Semester 5" => "3",
            "Ranking Semester 6" => "3",
            "Nilai Ujian Nasional (Rata-Rata)" => "84",
            "Status Ayah" => "Masih Hidup",
            "Kelas Keputusan" => "Yes"
        ),

    );

    // Initialize Data
    $input->setData($data); // Set data from array
    $input->setAttributes(array('OUTLOOK', 'TEMPERATURE', 'HUMIDITY', 'WINDY', 'PLAY')); // Set attributes of data

    // Initialize C4.5
    $c45->c45 = $input; // Set input data
    $c45->setTargetAttribute('PLAY'); // Set target attribute
    $initialize = $c45->initialize(); // initialize

    // Build Output
    $buildTree = $initialize->buildTree(); // Build tree
    $arrayTree = $buildTree->toArray(); // Set to array
    $stringTree = $buildTree->toString();
    $jsonTree = $buildTree->toJson(); // Set to string

    // echo "<pre>";
    // print_r($arrayTree);
    // echo "</pre>";

    echo $stringTree;

    $new_data = array(
        'OUTLOOK' => 'Sunny',
        'TEMPERATURE' => 'Hot',
        'HUMIDITY' => 'High',
        'WINDY' => FALSE
    );

    echo $c45->initialize()->buildTree()->classify($new_data); // print "No"
});
