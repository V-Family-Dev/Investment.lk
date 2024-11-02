<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Property_manage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Schema;

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
        return view('adminPanel.seller.propertyListSeller', compact('propertyManages'));
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
        $categoryType = [
            'apren' => 'Apartment for Rent',
            'apts' => 'Apartment for sales',
            'csbuns' => 'Colonia style bungalow sales',
            'eqts' => 'Equipment Sales',
            'hots' => 'Hotel sales',
            'fcs' => 'factory_sales',
            'houren' => 'house_rentals',
            'vehs' => 'industrial_vehicals',
            'lans' => 'land_sales',
            'luxhs' => 'luxury__house__sales',
            'roomr' => 'room_rentals',
            'plas' => 'plantation_sales',
        ];

        $ads = [];
        $errors = [];  // Array to store error messages

        foreach ($categoryTables as $category => $table) {
                $selectFields = [
                    'property_manages.id',
                    'property_manages.ads_payment_status',
                    "{$table}.title",
                    "{$table}.price",
                    "{$table}.location",
                ];

                if (Schema::hasColumn($table, 'image_path')) {
                    $selectFields[] = "{$table}.image_path";
                }

                $results = DB::table('property_manages')
                    ->join($table, 'property_manages.property_id', '=', "{$table}.id")
                    ->select($selectFields)
                    ->where('property_manages.ads_payment_status', 'not paid')
                    ->where('property_manages.category_name', $category)
                    ->get();

                foreach ($results as $result) {
                    $result->category_name = $categoryType[$category];
                    // Check if image_path is present before attempting to split
                    if (isset($result->image_path)) {
                        $images = explode(',', $result->image_path);
                        $result->first_image = $images[0] ?? 'default-image.jpg'; // Fallback if empty
                    } else {
                        $result->first_image = 'default-image.jpg';
                    }

                    $ads[] = $result;
                }

            // } catch (Exception $e) {
            //     // Log the error and add a message to the $errors array
            //     \Log::error("Error fetching data for table {$table}: " . $e->getMessage());
            //     $errors[] = "There was an issue fetching data for {$table}. Please check if the table structure or configuration is correct.";
            // }
        }

        // Pass both $ads and $errors to the view
        return view('propertyList', compact('ads', 'errors'));
        // return $ads;
    }



    // public function showuniqads($id)
    // {
    //     // Define the mapping of category codes to table names
    //     $categoryTables = [
    //         'apren' => 'apartment_rentals',
    //         'apts' => 'apartment_sales',
    //         'csbuns' => 'colonia__style__bungalow__sales',
    //         'eqts' => 'equipment_sales',
    //         'hots' => 'hotel_sales',
    //         'fcs' => 'factory_sales',
    //         'houren' => 'house_rentals',
    //         'vehs' => 'industrial_vehicals',
    //         'lans' => 'land_sales',
    //         'luxhs' => 'luxury__house__sales',
    //         'roomr' => 'room_rentals',
    //         'plas' => 'plantation_sales',
    //     ];

    //     // Step 1: Find the ad in property_manages by ID
    //     $ad = DB::table('property_manages')->where('id', $id)->first();

    //     if (!$ad) {
    //         abort(404, 'Property not found in property_manages');
    //     }

    //     // Step 2: Use the category_name to identify the specific table
    //     $category = $ad->category_name;
    //     $propertyTable = $categoryTables[$category] ?? null;

    //     if (!$propertyTable) {
    //         abort(404, 'Property category table not found');
    //     }

    //     // Step 3: Fetch the property details from the identified table
    //     $propertyDetails = DB::table($propertyTable)
    //         ->where('id', $ad->property_id) // property_id is used to join with the specific table
    //         ->first();

    //     if (!$propertyDetails) {
    //         abort(404, 'Property details not found in ' . $propertyTable);
    //     }

    //     // Merge the main ad data with the specific property details
    //     $ad = (object) array_merge((array) $ad, (array) $propertyDetails);

    //     // Return the view with all property details
    //     return view('/components/section1', compact('ad'));

    //     // return $ad;
    // }

    public function showuniqads($id)
    {
        // Define the mapping of category codes to table names
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

        // Step 1: Find the ad in property_manages by ID
        $ad = DB::table('property_manages')->where('id', $id)->first();

        if (!$ad) {
            abort(404, 'Property not found in property_manages');
        }

        // Step 2: Identify the specific table
        $category = $ad->category_name;
        $propertyTable = $categoryTables[$category] ?? null;

        if (!$propertyTable) {
            abort(404, 'Property category table not found');
        }

        // Step 3: Fetch the property details
        $propertyDetails = DB::table($propertyTable)
            ->where('id', $ad->property_id)
            ->first();

        if (!$propertyDetails) {
            abort(404, 'Property details not found in ' . $propertyTable);
        }
        $propertyDetails = (array) $propertyDetails;

        $adDetails = array_diff_key($propertyDetails, array_flip(['image_path','id','status','updated_at','category_name','location', 'contact_details', 'price', 'title', 'description']));

        // Merge main ad data with specific property details
        $ad = (object) array_merge((array) $ad, (array) $propertyDetails);

        // Return the main view with all property details
        return view('propertyDetail', compact('ad','adDetails'));
        // return $propertyDetails;
    }


}

?>
