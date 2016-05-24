<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Illuminate\Database\Capsule\Manager as DB;


/**
 * Description of TestCase
 *
 * @author VanBeerselJan
 */
abstract class TestCase extends PHPUnit_Framework_TestCase
{
    
    public function setUp()
    {
        $this->setUpDatabase();
        $this->migrateTable();
    }
    
    protected function makePost() {
        $post = new Post;
        $post->title='Some Title';
        $post->save();
        
        return $post;
        
    }

    public function setUpDatabase()
    {
        $database = new DB;
       
        $database->addConnection([
            'driver'=>'sqlite',
            'database'=>':memory:'
            ]);
        $database->bootEloquent();
        $database->setAsGlobal();
    }

    public function migrateTable()
    {
        DB::schema()->create('posts', function($table) {
            $table->increments('id');
            $table->string('title');
            $table->timestamps();
        });
    }

}

class Post extends \Illuminate\Database\Eloquent\Model 
{
    
    use \Jvbdevel\Dolly\Cacheable;
}
