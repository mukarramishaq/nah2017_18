<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtisanController extends Controller
{

    public function migrate($app_key){
        if($app_key != env('APP_KEY')){
            abort(403);
        }

        try {
            Artisan::call('migrate');
            echo 'Migrated tables';

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function migrateRefresh($app_key){
        if($app_key != env('APP_KEY')){
            abort(403);
        }

        try {
            Artisan::call('migrate:refresh');
            echo 'Migrate refreshed';

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function seed($app_key){

        if($app_key != env('APP_KEY')){
            abort(403);
        }

        try {
            set_time_limit(3600);
            Artisan::call('db:seed');
            echo 'Seeded';

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function down($app_key){

        if($app_key != env('APP_KEY')){
            abort(403);
        }

        try {
            Artisan::call('down');
            echo 'App is now in Maintenance Mode';

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function up($app_key){

        if($app_key != env('APP_KEY')){
            abort(403);
        }

        try {
            Artisan::call('up');
            echo 'App is no more in Maintenance Mode';
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
