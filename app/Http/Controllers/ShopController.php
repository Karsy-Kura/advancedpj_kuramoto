<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Category;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::all();
        $areas = Area::all();
        $genre = Category::all();

        $param = [
            'shops' => $shops,
            'areas' => $areas,
            'genres' => $genre,
        ];

        return view('index', $param);
    }

    /**
     * Show the detail infomation of shop from shop id
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $shop = Shop::find($id);
        if ($shop === null) {
            redirect('/');
        }

        $param = [
            'shop' => $shop,
        ];
        return view('shop-detail', $param);
    }

    /**
     * Search the shops by multiple condition.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // create condition.
        $query = $request->all();
        unset($query['_token']);

        $condition = array();
        foreach ($query as $key => $value)
        {
            switch ($key) {
                case "area":
                    if ($value == "All area")
                    {
                        break;
                    }

                    $area = Area::with('shops')->where('name', $value)->first();
                    if ($area === null) {
                        break;
                    }

                    $condition[] = ['area_id', $area->id];
                    break;

                case "genre":
                    if ($value == "All genre")
                    {
                        break;
                    }

                    $category = Category::with('shops')->where('name', $value)->first();
                    if ($category === null) {
                        break;
                    }

                    $condition[] = ['category_id', $category->id];
                    break;

                case "store":
                    if ($value === "")
                    {
                        break;
                    }

                    $condition[] = ['name', 'LIKE', '%' . $value . '%'];
                    break;

                default:
                    Log::warning('At ' . __FUNCTION__ . ', Invalid Key : ' . $key);
                    break;
            }
        }

        $shops = [];
        if (!empty($condition)) {
            $shops = Shop::where($condition)->get();
        }
        else {
            $shops = Shop::all();
        }

        $areas = Area::all();
        $genre = Category::all();
        $param = [
            'shops' => $shops,
            'areas' => $areas,
            'genres' => $genre,
            'query' => $query
        ];

        return view('index', $param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
