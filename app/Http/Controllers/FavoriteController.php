<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shopId = $request['shop_id'];
        $userId = Auth::id();
        $favoriteId = $request['favorite_id'];

        $condition = [];
        if ($favoriteId != null)
        {
            $condition[] = ['id', $favoriteId];
        }
        else
        {
            $condition[] = ['shop_id', $shopId];
        }

        $param = [
            'user_id' => $userId,
            'shop_id' => $shopId
        ];

        $favorite = Favorite::withTrashed('users')
            ->where($condition)
            ->firstOrCreate($param);

        if ($favorite->trashed() === true)
        {
            $favorite->restore();
        }

        return response()->json([
            'favorite_id' => $favorite->id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $shopId = $request['shop_id'];
        $favoriteId = $request['favorite_id'];
        $userId = Auth::id();

        $condition = [
            [ 'id', $favoriteId ],
            [ 'shop_id', $shopId ],
        ];

        $favorite = Favorite::with('users')
            ->where($condition)
            ->first();

        if ($favorite == null)
        {
            return response()->json();
        }

        $result = $favorite->delete();
        return response()->json([
            'result' => $result,
        ]);
    }
}
