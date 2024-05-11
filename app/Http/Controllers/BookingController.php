<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking\CreateBookingRequest;
use App\Http\Requests\Booking\UpdateBookingRequest;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $bookings = Booking::query();
        $bookings->with(['country', 'boardType']);

        if ($request->has('country_id')) {
            $bookings->where('country_id', '=', $request->input('country_id'));
        }

        if ($request->has('board_type_id')) {
            $bookings->where('board_type_id', '=', $request->input('board_type_id'));
        }

        if ($request->has('name')) {
            $bookings->where('name', '=', $request->input('name'));
        }

        if ($request->has('email')) {
            $bookings->where('email', '=', $request->input('email'));
        }

        if ($request->has('whatsapp')) {
            $bookings->where('whatsapp', '=', $request->input('whatsapp'));
        }

        if ($request->has('surfing_experience')) {
            $bookings->where('surfing_experience', '=', $request->input('surfing_experience'));
        }

        if ($request->has('visit_date')) {
            $bookings->where('visit_date', '=', $request->input('visit_date'));
        }

        if ($request->has('id_card')) {
            $bookings->where('id_card', '=', $request->input('id_card'));
        }

        if ($request->has('order') && $request->has('sort')) {
            $sort = $request->input('sort');
            $order = $request->input('order');

            $bookings->orderBy($sort, $order);
        }

        $page = (int) $request->input('page', 1);
        $perPage = (int) $request->input('per_page', 10);
        $bookings = $bookings->paginate($perPage, ['*'], 'page', $page);
        $total = $bookings->total();

        if ($bookings->isEmpty()) {
            return response()->json([
                'message' => 'no bookings found',
                'data' => [],
            ], 404);
        }

        return response()->json([
            'message' => 'success get all bookings',
            'data' => $bookings->items(),
            'meta' => [
                'page' => $page,
                'perPage' => $perPage,
                'total' => $total,
                'total_page' => ceil($total / $perPage),
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBookingRequest $request)
    {
        $data = $request->validated();

        $file = $request->file('id_card');
        $fileName = $file->hashName();

        $file->storePubliclyAs('public/id_cards', $fileName);

        $newBooking = [
            'country_id' => $data['country_id'],
            'board_type_id' => $data['board_type_id'],
            'name' => $data['name'],
            'email' => $data['email'],
            'whatsapp' => $data['whatsapp'],
            'surfing_experience' => $data['surfing_experience'],
            'visit_date' => $data['visit_date'],
            'id_card' => $fileName,
        ];

        $booking = Booking::create($newBooking);
        $booking = Booking::with(['country', 'boardType'])->where('id', '=', $booking->id)->first();

        return response()->json([
            'message' => 'success create new booking',
            'data' => $booking,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        $detail = $booking->with(['country', 'boardType'])
            ->where('id', '=', $booking->id)
            ->first();

        return response()->json([
            'message' => 'success get detail booking',
            'data' => $detail,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        $data = $request->validated();

        $booking->country_id = $data['country_id'];
        $booking->board_type_id = $data['board_type_id'];
        $booking->name = $data['name'];
        $booking->email = $data['email'];
        $booking->whatsapp = $data['whatsapp'];
        $booking->surfing_experience = $data['surfing_experience'];
        $booking->visit_date = $data['visit_date'];

        if ($request->hasFile('id_card')) {
            $file = $request->file('id_card');
            $fileName = $file->hashName();

            $file->storePubliclyAs('public/id_cards', $fileName);

            $booking->id_card = $fileName;
        }

        $booking->save();

        return response()->json([
            'message' => 'success update booking',
            'data' => $booking,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return response()->json([
            'message' => 'success delete booking',
            'data' => null,
        ]);
    }
}
