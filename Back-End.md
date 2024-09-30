# Investment.lk

# Investment Lanka Backend Documentation

## Overview

Investment Lanka is a large-scale e-commerce platform focusing on high-value products. This document outlines the database schema, models, controllers, and API endpoints required for the Laravel-based backend of the application.

## Database Schema

### 1. **Users Table**

- **Purpose**: Stores user/seller information.
- **Structure**:
  - `id`: Primary key.
  - `first_name`: First name of the user.
  - `last_name`: Last name of the user.
  - `email`: Unique email address.
  - `id_number`: Unique identification number (e.g., NIC).
  - `address`: Home address.
  - `phone_number`: Unique phone number.
  - `otp`: One-time password for phone verification.
  - `id_verification`: Path to ID verification document.
  - `address_verification`: Path to address verification document (optional).
  - `timestamps`: Automatically managed `created_at` and `updated_at` timestamps.

### 2. **Categories Table**

- **Purpose**: Stores product categories.
- **Structure**:
  - `id`: Primary key.
  - `name`: Name of the category (e.g., Factories, High-end Properties).
  - `timestamps`: Automatically managed `created_at` and `updated_at` timestamps.

### 3. **Listings Table**

- **Purpose**: Stores general listing information.
- **Structure**:
  - `id`: Primary key.
  - `user_id`: Foreign key to `Users`.
  - `category_id`: Foreign key to `Categories`.
  - `title`: Title of the listing.
  - `location`: Geographical location.
  - `price`: Listing price.
  - `description`: Detailed description.
  - `photos`: List of photo URLs.
  - `contact_details`: Contact information.
  - `listing_type`: Type of listing (e.g., factory_sale, luxury_house).
  - `timestamps`: Automatically managed `created_at` and `updated_at` timestamps.

### 4. **Factories Table**

- **Purpose**: Stores factory-specific details.
- **Structure**:
  - `id`: Primary key.
  - `listing_id`: Foreign key to `Listings`.
  - `property_type`: Type of factory.
  - `property_features`: List of specific features.
  - `size`: Size of the factory.
  - `timestamps`: Automatically managed `created_at` and `updated_at` timestamps.

### 5. **Luxury Houses Table**

- **Purpose**: Stores luxury house-specific details.
- **Structure**:
  - `id`: Primary key.
  - `listing_id`: Foreign key to `Listings`.
  - `address`: Address of the house.
  - `bedrooms`: Number of bedrooms.
  - `bathrooms`: Number of bathrooms.
  - `house_size`: Size of the house.
  - `land_size`: Size of the land.
  - `timestamps`: Automatically managed `created_at` and `updated_at` timestamps.

### 6. **Apartments Table**

- **Purpose**: Stores apartment-specific details.
- **Structure**:
  - `id`: Primary key.
  - `listing_id`: Foreign key to `Listings`.
  - `address`: Address of the apartment.
  - `bedrooms`: Number of bedrooms.
  - `bathrooms`: Number of bathrooms.
  - `size`: Size of the apartment.
  - `timestamps`: Automatically managed `created_at` and `updated_at` timestamps.

### 7. **Bungalows Table**

- **Purpose**: Stores bungalow-specific details.
- **Structure**:
  - `id`: Primary key.
  - `listing_id`: Foreign key to `Listings`.
  - `address`: Address of the bungalow.
  - `bedrooms`: Number of bedrooms.
  - `bathrooms`: Number of bathrooms.
  - `house_size`: Size of the bungalow.
  - `land_size`: Size of the land.
  - `timestamps`: Automatically managed `created_at` and `updated_at` timestamps.

### 8. **Hotels Table**

- **Purpose**: Stores hotel-specific details.
- **Structure**:
  - `id`: Primary key.
  - `listing_id`: Foreign key to `Listings`.
  - `property_type`: Type of hotel.
  - `size`: Size of the hotel.
  - `location`: Location of the hotel.
  - `property_features`: Features of the hotel.
  - `timestamps`: Automatically managed `created_at` and `updated_at` timestamps.

### 9. **Lands Table**

- **Purpose**: Stores land-specific details.
- **Structure**:
  - `id`: Primary key.
  - `listing_id`: Foreign key to `Listings`.
  - `land_type`: Type of land.
  - `land_size`: Size of the land.
  - `timestamps`: Automatically managed `created_at` and `updated_at` timestamps.

### 10. **Industrial Vehicles Table**

- **Purpose**: Stores industrial vehicle-specific details.
- **Structure**:
  - `id`: Primary key.
  - `listing_id`: Foreign key to `Listings`.
  - `vehicle_name`: Name of the vehicle.
  - `brand`: Brand of the vehicle.
  - `location`: Location of the vehicle.
  - `condition`: Condition of the vehicle.
  - `model`: Model of the vehicle.
  - `year_of_manufacture`: Year of manufacture.
  - `fuel_type`: Type of fuel.
  - `mileage`: Mileage.
  - `color`: Color of the vehicle.
  - `engine_capacity`: Capacity of the engine.
  - `body_type`: Type of body.
  - `trim_edition`: Trim or edition.
  - `transmission`: Type of transmission.
  - `timestamps`: Automatically managed `created_at` and `updated_at` timestamps.

### 11. **Plantations Table**

- **Purpose**: Stores plantation-specific details.
- **Structure**:
  - `id`: Primary key.
  - `listing_id`: Foreign key to `Listings`.
  - `land_type`: Type of plantation.
  - `land_size`: Size of the plantation.
  - `timestamps`: Automatically managed `created_at` and `updated_at` timestamps.

### 12. **Master Pieces Table**

- **Purpose**: Stores master pieces-specific details.
- **Structure**:
  - `id`: Primary key.
  - `listing_id`: Foreign key to `Listings`.
  - `condition`: Condition of the item.
  - `timestamps`: Automatically managed `created_at` and `updated_at` timestamps.

### 13. **Antique Value Things Table**

- **Purpose**: Stores antique value things-specific details.
- **Structure**:
  - `id`: Primary key.
  - `listing_id`: Foreign key to `Listings`.
  - `condition`: Condition of the item.
  - `timestamps`: Automatically managed `created_at` and `updated_at` timestamps.

### 14. **Warehouses Table**

- **Purpose**: Stores warehouse-specific details.
- **Structure**:
  - `id`: Primary key.
  - `listing_id`: Foreign key to `Listings`.
  - `property_type`: Type of warehouse.
  - `size`: Size of the warehouse.
  - `rental_or_sale_price`: Price for rental or sale.
  - `timestamps`: Automatically managed `created_at` and `updated_at` timestamps.

### 15. **Tourism Properties Table**

- **Purpose**: Stores tourism properties-specific details.
- **Structure**:
  - `id`: Primary key.
  - `listing_id`: Foreign key to `Listings`.
  - `property_type`: Type of tourism property.
  - `size`: Size of the property.
  - `property_features`: Features relevant to tourism.
  - `timestamps`: Automatically managed `created_at` and `updated_at` timestamps.

### 16. **Beach Side Properties Table**

- **Purpose**: Stores beachside properties-specific details.
- **Structure**:
  - `id`: Primary key.
  - `listing_id`: Foreign key to `Listings`.
  - `property_type`: Type of beachside property.
  - `size`: Size of the property.
  - `property_features`: Features relevant to beachside properties.
  - `timestamps`: Automatically managed `created_at` and `updated_at` timestamps.

## Models

### User Model

**File: `app/Models/User.php`**

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'id_number', 'address', 
        'phone_number', 'otp', 'id_verification', 'address_verification'
    ];

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}
```

### Listing Model

**File: `app/Models/Listing.php`**

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'category_id', 'title', 'location', 'price', 
        'description', 'photos', 'contact_details', 'listing_type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function specificListing()
    {
        switch ($this->listing_type)

 {
            case 'factory_sale':
                return $this->hasOne(Factory::class);
            case 'luxury_house':
                return $this->hasOne(LuxuryHouse::class);
            // Add other cases for different listing types
        }
    }
}
```

### Category Model

**File: `app/Models/Category.php`**

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}
```

### Factory Model

**File: `app/Models/Factory.php`**

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factory extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id', 'property_type', 'property_features', 'size'
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
```

### LuxuryHouse Model

**File: `app/Models/LuxuryHouse.php`**

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuxuryHouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id', 'address', 'bedrooms', 'bathrooms', 
        'house_size', 'land_size'
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
```

### Apartment Model

**File: `app/Models/Apartment.php`**

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id', 'address', 'bedrooms', 'bathrooms', 'size'
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
```

### Bungalow Model

**File: `app/Models/Bungalow.php`**

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bungalow extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id', 'address', 'bedrooms', 'bathrooms', 
        'house_size', 'land_size'
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
```

### Hotel Model

**File: `app/Models/Hotel.php`**

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id', 'property_type', 'size', 'location', 'property_features'
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
```

### Land Model

**File: `app/Models/Land.php`**

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id', 'land_type', 'land_size'
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
```

### IndustrialVehicle Model

**File: `app/Models/IndustrialVehicle.php`**

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustrialVehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id', 'vehicle_name', 'brand', 'location', 
        'condition', 'model', 'year_of_manufacture', 'fuel_type',
        'mileage', 'color', 'engine_capacity', 'body_type', 
        'trim_edition', 'transmission'
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
```

### Plantation Model

**File: `app/Models/Plantation.php`**

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plantation extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id', 'land_type', 'land_size'
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
```

### MasterPiece Model

**File: `app/Models/MasterPiece.php`**

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPiece extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id', 'condition'
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
```

### AntiqueValueThing Model

**File: `app/Models/AntiqueValueThing.php`**

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AntiqueValueThing extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id', 'condition'
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
```

### Warehouse Model

**File: `app/Models/Warehouse.php`**

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id', 'property_type', 'size', 'rental_or_sale_price'
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
```

### TourismProperty Model

**File: `app/Models/TourismProperty.php`**

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourismProperty extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id', 'property_type', 'size', 'property_features'
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
```

### BeachSideProperty Model

**File: `app/Models/BeachSideProperty.php`**

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeachSideProperty extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id', 'property_type', 'size', 'property_features'
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
```

## Controllers

### ListingController

**File: `app/Http/Controllers/ListingController.php`**

```php
namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string',
            'location' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'photos' => 'required|array',
            'contact_details' => 'required|string',
            'listing_type' => 'required|string|in:factory_sale,luxury_house,apartment,bungalow,hotel,land,industrial_vehicle,plantation,master_piece,antic_value,warehouse,tourism_property,beach_side_property',
        ]);

        $listing = Listing::create($request->all());

        return response()->json($listing, 201);
    }

    public function show($id)
    {
        $listing = Listing::findOrFail($id);
        return response()->json($listing);
    }

    public function index()
    {
        $listings = Listing::all();
        return response()->json($listings);
    }
}
```

## Routes

**File: `routes/api.php`**

```php
use App\Http\Controllers\ListingController;

Route::prefix('api')->group(function () {
    Route::post('listings', [ListingController::class, 'store']);
    Route::get('listings/{id}', [ListingController::class, 'show']);
    Route::get('listings', [ListingController::class, 'index']);
});
```

## Seeders

### UserSeeder

**File: `database/seeders/UserSeeder.php`**

```php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'id_number' => '123456789V',
            'address' => '123 Main Street',
            'phone_number' => '0771234567',
            'id_verification' => 'path/to/id_verification.jpg',
        ]);
    }
}
```

**Run the seeder with:**

```bash
php artisan db:seed --class=UserSeeder
```

## Conclusion

This documentation provides a comprehensive guide for setting up the backend for Investment Lanka using Laravel. The database schema, models, controllers, and routes are designed to handle various

 types of listings and their specific details efficiently, ensuring data integrity and minimizing redundancy.

For any further customization or detailed implementation, please refer to Laravel's official documentation or consult with the development team.

This documentation covers the database schema, models, controllers, and API routes with detailed explanations and code examples. It should serve as a comprehensive guide for the backend development of the Investment Lanka project.
