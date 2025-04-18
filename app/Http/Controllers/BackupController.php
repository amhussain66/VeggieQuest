<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Inventory;
use App\Models\Setting;
use App\Models\SubCategories;
use App\Models\WebsiteSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BackupController extends Controller
{

    public function BackupDatabaseDaily()
    {
        $filename = "Backup_".date('d-m-Y').".sql";
        $command = "mysqldump --user=".env('DB_USERNAME')." --password=".env('DB_PASSWORD')." --host=".env('DB_HOST')." ".env('DB_DATABASE')." > ".storage_path()."/app/".$filename;
        exec($command);
    }




}
