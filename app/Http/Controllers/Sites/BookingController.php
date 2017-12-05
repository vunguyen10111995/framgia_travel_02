<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Requests\sites\BookingRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Plan;
use App\Models\Schedule;
use App\Models\Booking;
use App\Models\Customer;

class BookingController extends Controller
{
    public function getAdult()
    {
        return view('sites._component.booking_plan.adult');
    }

    public function getChild()
    {
        return view('sites._component.booking_plan.child');
    }

    public function show($id)
    {
        $plan = Plan::find($id);
        $schedules = Schedule::whereSchedule($id)->pluck('price');
        $sumSchedule = $schedules->sum();

        return view('sites._component.booking_plan.booking', compact('plan', 'sumSchedule'));
    }

    public function store(BookingRequest $request)
    {
        $plan = Plan::find($request->id);

        DB::beginTransaction();

        try {
            $booking = new Booking();
            $booking->user_id = Auth::user()->id;
            $booking->plan_id = $request->id;
            $booking->fill($request->all());
            $booking->start_at = $plan->start_at;
            $booking->end_at = $plan->end_at;
            $booking->status = config('setting.status.inprogress');
            $booking->save();

            $num = $request->total_num;
            for ($i = 0; $i < $num; $i++) {
                $customer = new Customer();
                $customer->booking_id = $booking->id;
                $customer->full_name = $request->full_name_guest[$i];
                $customer->gender = $request->gender[$i];
                $customer->address = $request->address[$i];
                $customer->country = $request->country_guest[$i];
                $customer->guest = $request->guest[$i];
                $customer->save();
            }

            return redirect(route('user.dashboard', Auth::user()->id));
        } catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response);
            DB::rollback();
        }

        DB::commit();
    }

    public function showListBooking()
    {
        $user = User::find($request->id);
        $bookings = Booking::where('user_id', '=' , $user->id)->get();
        $html = view('sites._component.view_booking', compact('bookings'))->render();

        return response($html);
    }
}
