<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLocation extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Gets the product related to the productlocation
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }


    /**
     * Gets the location related to the productlocation
     */
    public function location()
    {
        return $this->belongsTo(location::class, 'location_id');
    }

    /**
     * Check if a pallet already exists at a specific location
     *
     * @param $palletId - The pallet's product_id from the database
     * @param $locationId - The location where the pallet will be stored
     * @returns - True if that pallet type is already there, False if it is not
     */
    public static function checkPalletExists($palletId, $locationId)
    {
        return ProductLocation::where('product_id', $palletId)
            ->where('location_id', $locationId)->exists();
    }

    /**
     * Function to increase the total number of pallets at a location
     *
     * @param $loggedAmount - The amount being added
     */
    public function increasePalletQuantity($loggedAmount)
    {
        $this->Quantity += $loggedAmount;
        $this->save();
    }

    /**
     * Function to decrease the total number of pallets at a location
     *
     * @param $loggedAmount - The amount being removed
     */
    public function decreasePalletQuantity($loggedAmount)
    {
        $this->Quantity -= $loggedAmount;
        $this->save();
    }

    /**
     * Function to check if there is space available at a specific location
     *
     * @param $locationId - The location's ID on the locations table.
     * @return boolean - If there is still space available or not
     */
    public static function checkAvailableSpace($locationId)
    {
        $filledSpace = ProductLocation::calculateAvailableSpace($locationId);
        $storageArea = Location::find($locationId);

        return ($filledSpace < $storageArea->available_storage_space);
    }

    /**
     * Function to calculate the total available space in a given location
     *
     * @param $locationId - The location's ID on the locations table.
     * @return int - The total amount of space available
     */
    public static function calculateAvailableSpace($locationId)
    {
        $filledSpace = 0;
        $palletLocations = ProductLocation::where('location_id', $locationId)->get();

        foreach ($palletLocations as $palletLocation) {
            $filledSpace += $palletLocation->Quantity;
        }

        return $filledSpace;
    }

}
