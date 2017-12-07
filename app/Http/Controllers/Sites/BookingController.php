<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Plan;
use App\Models\User;
use App\Models\PlanProvince;
use App\Models\Schedule;
use App\Models\Booking;
use App\Models\Customer;
use App\Mail\MailBooking;
use Stripe;
use Mail;

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
        try {
            $plan = Plan::findOrFail($id);
            $planProvinces = PlanProvince::whereProvince($id)->keyBy('province_id');
            $schedules = Schedule::whereSchedule($id)->pluck('price');
            $sumSchedule = $schedules->sum();
           
            return view('sites._component.booking_plan.booking', compact(
                'plan',
                'sumSchedule',
                'planProvinces'
            ));
        } catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response);
        }
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $plan = Plan::findOrFail($request->id);
            $bookings = Booking::whereBooking(Auth::user()->id, $request->id)->pluck('id')->last();

            $booking = new Booking();
            $booking->user_id = Auth::user()->id;
            $booking->plan_id = $request->id;
            $booking->fill($request->all());
            $booking->start_at = $plan->start_at;
            $booking->end_at = $plan->end_at;
            $booking->status = config('setting.unpaid');
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

            DB::commit();

            Mail::to($request->email)->send(new MailBooking($booking));
        } catch (Exception $e) {
            DB::rollback();
            $response['error'] = true;

            return response()->json($response);
        }
    }

    public function payment(Request $request, $id)
    {
        try {
            $stripe = Stripe::make(config('services.stripe.secret'));

            $token = $stripe->tokens()->create([
                'card' => [
                    'number' => $request->number_card,
                    'exp_month' => $request->exp_month,
                    'exp_year' => $request->exp_year,
                    'cvc' => $request->cvc,
                ],
            ]);

            if (!isset($token['id'])) {
                return back();
            }

            $charge = $stripe->charges()->create([
                'card' => $token['id'],
                'currency' => trans('site.usd'),
                'amount' => $request->total_amount,
                'description' => trans('site.pay_stripe'),
            ]);

            $bookings = Booking::whereBooking(Auth::user()->id, $id)->pluck('id')->last();
            $booking = Booking::find($bookings);
            $booking->status = config('setting.paid');
            $result = $booking->save();

            if (!$result) {
                return back();
            }

            Mail::to($request->email)->send(new MailBooking($booking));
        } catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response);
        }
    }

    public function showListBooking(Request $request)
    {
        try {
            $user = User::findOrFail($request->id);
            $bookings = Booking::with('plan')->where('user_id', '=', $user->id)->orderBy('created_at', 'desc')->get();
            $html = view('sites._component.view_booking', compact('bookings'))->render();

            return response($html);
        } catch (Exception $e) {
            $response['error'] = true;

            return response()->json($response);
        }
        
    }

    public function showDetailBooking(Request $request)
    {
        $booking = Booking::find($request->id);
        $html = view('sites._component.view_detail_booking', compact('booking'))->render();

        return response($html);
    }
}
