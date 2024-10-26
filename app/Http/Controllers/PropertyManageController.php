<?php

namespace App\Http\Controllers;

use App\Models\Property_manage;
use Illuminate\Http\Request;

class PropertyManageController extends Controller
{
    public function index()
{
    $propertyManages = Property_manage::with('user')->get();
    return view('adminPanel.admin.property_manages', compact('propertyManages'));
}

}
