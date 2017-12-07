<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\Category;
use App\Models\Service;

class ShowInfoDashboardController extends Controller
{
    public function showProvinces()
    {
        $provinces = Province::paginate(9);

        return view('sites._component.province', compact('provinces'));
    }

    public function provinceDetail($id)
    {
        try {
            $province = Province::findOrFail($id);
            
            return view('sites._component.province_detail', compact('province'));
        }
        catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response);
        }
    }
    
    public function showHotels()
    {
        $categories = Category::with('services')->find(1);

        return view('sites._component.hotel', compact('categories'));
    }

    public function hotelDetail($id)
    {
        try {
            $hotel = Service::with('province')->findOrFail($id);
            
            return view('sites._component.hotel_detail', compact('hotel'));
        }
        catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response);
        }
    }
    
    public function showRestaurants()
    {
        $categories = Category::with('services')->find(2);
        
        return view('sites._component.restaurant', compact('categories'));
    }

    public function restaurantDetail($id)
    {
        try {
            $restaurant = Service::with('province')->findOrFail($id);
            
            return view('sites._component.restaurant_detail', compact('restaurant'));
        }
        catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response);
        }
    }

    public function showActivities()
    {
        $categories = Category::with('services')->find(3);
        
        return view('sites._component.restaurant', compact('categories'));
    }

    public function activityDetail($id)
    {
        try {
            $activity = Service::with('province')->findOrFail($id);
            
            return view('sites._component.activity_detail', compact('activity'));
        }
        catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response);
        }
    }
    
}
