<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReserveRequest;
use App\Models\Reserve;
use DateTime;
use DateTimeImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReserveController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ReserveRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReserveRequest $request)
    {
        $info = Reserve::getReserveInfo($request->all(), Auth::id());

        $reserve = new Reserve();
        if (!$reserve->fill($info)->save()) {
            return redirect();
        }

        return view('complete');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\ReserveRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $reserve_id = $request->id;

        $result = Reserve::find($reserve_id)->delete();

        return back();
    }
}
