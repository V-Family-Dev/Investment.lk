<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

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

    public function showpropertytoseller()
    {
        $userId = Auth::id(); // Get the current signed-in user's ID
        $propertyManages = Property_manage::where('user_id', $userId)->get(); // Filter properties by user ID
        return view('adminPanel.seller.property_show', compact('propertyManages'));
    }


    public function showpropertyDetails($property_id, $category_name)
    {
        $categoryTables = [
            'apren' => 'apartment_rentals',
            'apts' => 'apartment_sales',
            'csbuns' => 'colonia__style__bungalow__sales',
            'eqts' => 'equipment_sales',
            'hots' => 'hotel_sales',
            'fcs' => 'factory_sales',
            'houren' => 'house_rentals',
            'vehs' => 'industrial_vehicals',
            'lans' => 'land_sales',
            'luxhs' => 'luxury__house__sales',
            'roomr' => 'room_rentals',
            'plas' => 'plantation_sales',
        ];

        if (!array_key_exists($category_name, $categoryTables)) {
            abort(404, 'Category not found');
        }

        $tableName = $categoryTables[$category_name];
        $adDetails = DB::table($tableName)->where('id', $property_id)->first();

        if (!$adDetails) {
            abort(404, 'Ad not found');
        }
        $selectedData = [
            'id' => $adDetails->id,
            'title' => $adDetails->title,
            'description' => $adDetails->description,
            'price' => $adDetails->price,
            'location' => $adDetails->location,
            // Add any other specific fields you need
        ];

        return response()->json($adDetails);
        // return view('adminPanel.admin.ad-details', compact('adDetails', 'category_name'));

    }
    public function updateStatus(Request $request)
    {
        $propertyManage = Property_manage::findOrFail($request->id);
        $propertyManage->status = $request->status;
        $propertyManage->save();

        return response()->json(['status' => $propertyManage->status]);
    }

    public function updateActiveStatusofad(Request $request)
    {
        $propertyManage = Property_manage::findOrFail($request->id);
        $propertyManage->active_or_not = $request->active_or_not;
        $propertyManage->save();

        return response()->json(['active_or_not' => $propertyManage->active_or_not]);
    }

    public function updatePaymentStatus(Request $request)
    {
        $property = Property_manage::findOrFail($request->id);

        // Toggle the payment status
        $property->ads_payment_status = $request->status;
        $property->save();

        return response()->json(['status' => $property->ads_payment_status]);
    }




    public function showPropertyListings()
    {
        $categoryTables = [
            'apren' => 'apartment_rentals',
            'apts' => 'apartment_sales',
            'csbuns' => 'colonia__style__bungalow__sales',
            'eqts' => 'equipment_sales',
            'hots' => 'hotel_sales',
            'fcs' => 'factory_sales',
            'houren' => 'house_rentals',
            'vehs' => 'industrial_vehicals',
            'lans' => 'land_sales',
            'luxhs' => 'luxury__house__sales',
            'roomr' => 'room_rentals',
            'plas' => 'plantation_sales',
        ];

        $ads = [];

        foreach ($categoryTables as $category => $table) {
            $results = DB::table('property_manages')
                ->join($table, 'property_manages.property_id', '=', "{$table}.id")
                ->select(
                    'property_manages.id',
                    'property_manages.ads_payment_status',
                    DB::raw("COALESCE({$table}.title, {$table}.vehical_name, {$table}.equipment_name) AS title"),
                    DB::raw("COALESCE({$table}.price, {$table}.rent_price) AS price"),
                    DB::raw("COALESCE({$table}.address, {$table}.location) AS address"),
                    DB::raw("COALESCE({$table}.size, {$table}.land_size, {$table}.brand) AS size"), // Fixed line
                    "{$table}.image_path"
                )
                ->where('property_manages.ads_payment_status', 'Paid')
                ->where('property_manages.category_name', $category)
                ->get();

            foreach ($results as $result) {
                $result->first_image = json_decode($result->image_path, true)[0] ?? 'default-image.jpg';
                $ads[] = $result;
            }
        }

        return view('property-listing', compact('ads'));

    }

}
