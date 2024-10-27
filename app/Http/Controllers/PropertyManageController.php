<?php

namespace App\Http\Controllers;

use App\Models\Property_manage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyManageController extends Controller
{
    public function index()
{
    
    $propertyManages = Property_manage::with('user')->get();
    return view('adminPanel.admin.propertyList', compact('propertyManages'));
}

public function showpropertyDetails($property_id, $category_name)
    {
        $categoryTables = [
            'apren' => 'apartment_rentals',
            'apts' => 'apartment_sales',
            'csbuns' => 'colonia__style__bungalow__sales',
            'eqts' => 'equipment_sales',
            'hots'=>'hotel_sales',
            'fcs'=>'factory_sales',
            'houren'=>'house_rentals',
            'vehs'=>'industrial_vehicals',
            'lans'=>'land_sales',
            'luxhs'=>'luxury__house__sales',
            'roomr'=>'room_rentals',
            'plas'=>'plantation_sales',
        ];

        if (!array_key_exists($category_name, $categoryTables)) {
            abort(404, 'Category not found');
        }

        $tableName = $categoryTables[$category_name];
        $adDetails = DB::table($tableName)->where('id', $property_id)->first();

        if (!$adDetails) {
            abort(404, 'Ad not found');
        }

        // return view('adminPanel.admin.ad-details', compact('adDetails', 'category_name'));
        return response()->json($adDetails);
    }

}
