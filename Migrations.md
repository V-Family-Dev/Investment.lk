# Laravel Migrations for Investment Lanka

## Introduction

Migrations are an essential part of Laravel's database schema management. They allow you to define and modify your database schema in a version-controlled manner. This document outlines the migrations for the Investment Lanka project, which includes tables for users, categories, listings, and various types of listing details.

## Migration Files

### 1. Create Users Table

**File: `database/migrations/2024_07_22_000000_create_users_table.php`**

```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('id_number')->unique();
            $table->text('address');
            $table->string('phone_number');
            $table->string('id_verification');
            $table->string('address_verification')->nullable(); // Optional
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
```

### 2. Create Categories Table

**File: `database/migrations/2024_07_22_000001_create_categories_table.php`**

```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
```

### 3. Create Listings Table

**File: `database/migrations/2024_07_22_000002_create_listings_table.php`**

```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsTable extends Migration
{
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('location');
            $table->decimal('price', 15, 2);
            $table->text('description');
            $table->json('photos'); // Storing multiple photo URLs in JSON format
            $table->string('contact_details');
            $table->string('listing_type'); // Type of listing (e.g., factory_sale, luxury_house, etc.)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('listings');
    }
}
```

### 4. Create Factory Table

**File: `database/migrations/2024_07_22_000003_create_factories_table.php`**

```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactoriesTable extends Migration
{
    public function up()
    {
        Schema::create('factories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained()->onDelete('cascade');
            $table->string('property_type');
            $table->text('property_features');
            $table->decimal('size', 15, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('factories');
    }
}
```

### 5. Create Luxury Houses Table

**File: `database/migrations/2024_07_22_000004_create_luxury_houses_table.php`**

```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLuxuryHousesTable extends Migration
{
    public function up()
    {
        Schema::create('luxury_houses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained()->onDelete('cascade');
            $table->string('address');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->decimal('house_size', 15, 2);
            $table->decimal('land_size', 15, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('luxury_houses');
    }
}
```

### 6. Create Apartments Table

**File: `database/migrations/2024_07_22_000005_create_apartments_table.php`**

```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained()->onDelete('cascade');
            $table->string('address');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->decimal('size', 15, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('apartments');
    }
}
```

### 7. Create Bungalows Table

**File: `database/migrations/2024_07_22_000006_create_bungalows_table.php`**

```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBungalowsTable extends Migration
{
    public function up()
    {
        Schema::create('bungalows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained()->onDelete('cascade');
            $table->string('address');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->decimal('house_size', 15, 2);
            $table->decimal('land_size', 15, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bungalows');
    }
}
```

### 8. Create Hotels Table

**File: `database/migrations/2024_07_22_000007_create_hotels_table.php`**

```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained()->onDelete('cascade');
            $table->string('property_type');
            $table->decimal('size', 15, 2);
            $table->string('location');
            $table->text('property_features');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
```

### 9. Create Lands Table

**File: `database/migrations/2024_07_22_000008_create_lands_table.php`**

```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandsTable extends Migration
{
    public function up()
    {
        Schema::create('lands', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained()->onDelete('cascade');
            $table->string('land_type');
            $table->decimal('land_size', 15, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lands');
    }
}
```

### 10. Create Industrial Vehicles Table

**File: `database/migrations/2024_07_22_000009_create_industrial_vehicles_table.php`**

```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndustrialVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('industrial_vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained()->onDelete('cascade');
            $table->string('vehicle_name');
            $table->string('brand');
            $table->string('location');
            $table->string('condition');
            $table->string('model');
            $table->integer('year_of_manufacture');
            $table->string('fuel_type');
            $table->decimal('mileage', 15, 2);
            $table->string('color');
            $table->decimal('engine_capacity', 10, 2);
            $table->string('body_type');
            $table->string('trim_edition');
            $table->string('transmission');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('industrial_vehicles');
    }
}
```

### 11. Create Plantations Table

**File:

 `database/migrations/2024_07_22_000010_create_plantations_table.php`**

```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantationsTable extends Migration
{
    public function up()
    {
        Schema::create('plantations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained()->onDelete('cascade');
            $table->string('land_type');
            $table->decimal('land_size', 15, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plantations');
    }
}
```

### 12. Create Master Pieces Table

**File: `database/migrations/2024_07_22_000011_create_master_pieces_table.php`**

```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterPiecesTable extends Migration
{
    public function up()
    {
        Schema::create('master_pieces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained()->onDelete('cascade');
            $table->string('condition');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('master_pieces');
    }
}
```

### 13. Create Antiques Table

**File: `database/migrations/2024_07_22_000012_create_antique_values_table.php`**

```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntiqueValuesTable extends Migration
{
    public function up()
    {
        Schema::create('antique_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained()->onDelete('cascade');
            $table->string('condition');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('antique_values');
    }
}
```

### 14. Create Warehouses Table

**File: `database/migrations/2024_07_22_000013_create_warehouses_table.php`**

```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehousesTable extends Migration
{
    public function up()
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained()->onDelete('cascade');
            $table->string('property_type');
            $table->decimal('size', 15, 2);
            $table->decimal('rental_or_sale_price', 15, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('warehouses');
    }
}
```

### 15. Create Tourism Properties Table

**File: `database/migrations/2024_07_22_000014_create_tourism_properties_table.php`**

```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourismPropertiesTable extends Migration
{
    public function up()
    {
        Schema::create('tourism_properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained()->onDelete('cascade');
            $table->string('property_type');
            $table->decimal('size', 15, 2);
            $table->text('property_features');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tourism_properties');
    }
}
```

### 16. Create Beachside Properties Table

**File: `database/migrations/2024_07_22_000015_create_beachside_properties_table.php`**

```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeachsidePropertiesTable extends Migration
{
    public function up()
    {
        Schema::create('beachside_properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained()->onDelete('cascade');
            $table->string('property_type');
            $table->decimal('size', 15, 2);
            $table->text('property_features');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('beachside_properties');
    }
}
```

## Summary

These migrations will set up the database schema for the Investment Lanka project, handling various types of listings and ensuring data integrity. Each migration file corresponds to a specific table in the database, capturing unique attributes for each type of listing.

For further customization or additional requirements, refer to Laravel's documentation or consult with your development team.
```

This document provides a comprehensive overview of the migration files needed to set up the database schema for the Investment Lanka project.
