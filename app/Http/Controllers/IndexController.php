<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\Options;
use SEO;
use SEOMeta;
use OpenGraph;
use App\Models\Menu;
use Illuminate\Support\Facades\Mail;
use App\Models\Rooms;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Attributes;
use App\Models\Inventory;
use App\Models\Collection;
use Cart;
use App\Models\City;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Http\Requests\CheckoutRequest;

class IndexController extends Controller
{

	public $config_info;

    public function __construct()
    {
        $site_info = Options::where('type', 'general')->first();
        if ($site_info) {
            $site_info = json_decode($site_info->content);
            $this->config_info = $site_info;

            OpenGraph::setUrl(\URL::current());
            OpenGraph::addProperty('locale', 'vi');
            OpenGraph::addProperty('type', 'article');

            SEOMeta::addKeyword($site_info->site_keyword);


            $category = Categories::where('type', 'product_category')->where('parentId', NULL)->get();

            $category_rooms = Categories::where('type', 'rooms')->where('parentId', 0)->get();

            $category_collection = Categories::where('type', 'collection')->where('parentId', 0)->get();

            view()->share(compact('site_info', 'category', 'category_rooms', 'category_collection'));
        }
    }

    public function createSeo($dataSeo = null)
    {
        $site_info = $this->config_info;
        if (!empty($dataSeo->meta_title)) {
            SEO::setTitle($dataSeo->meta_title);
        } else {
            SEO::setTitle($site_info->site_title);
        }
        if (!empty($dataSeo->meta_description)) {
            SEOMeta::setDescription($dataSeo->meta_description);
            OpenGraph::setDescription($dataSeo->meta_description);
        } else {
            SEOMeta::setDescription($site_info->site_description);
            OpenGraph::setDescription($site_info->site_description);
        }
        if (!empty($dataSeo->image)) {
            OpenGraph::addImage($dataSeo->image, ['height' => 400, 'width' => 400]);
        } else {
            OpenGraph::addImage($site_info->logo_share, ['height' => 400, 'width' => 400]);
        }
        if (!empty($dataSeo->meta_keyword)) {
            SEOMeta::addKeyword($dataSeo->meta_keyword);
        }
    }

    public function createSeoPost($data)
    {
        if(!empty($data->meta_title)){
            SEO::setTitle($data->meta_title);
        }else {
            SEO::setTitle($data->name);
        }
        if(!empty($data->meta_description)){
            SEOMeta::setDescription($data->meta_description);
            OpenGraph::setDescription($data->meta_description);
        }else {
            SEOMeta::setDescription($this->config_info->site_description);
            OpenGraph::setDescription($this->config_info->site_description);
        }
        if (!empty($data->image)) {
            OpenGraph::addImage($data->image, ['height' => 400, 'width' => 400]);
        } else {
            OpenGraph::addImage($this->config_info->logo_share, ['height' => 400, 'width' => 400]);
        }
        if (!empty($data->meta_keyword)) {
            SEOMeta::addKeyword($data->meta_keyword);
        }
    }

    public function getHome()
    {
        $category = Categories::where('parentId', NULL)->get();

        $categoryHome = Categories::where('showHome', 1)->get();

        $collection = Collection::where('status', 1)->orderBy('created_at', 'DESC')->take(5)->get();

    	return view('frontend.pages.home', compact('category', 'categoryHome', 'collection'));
    }

    public function getSearch(Request $request)
    {
        $q = $request->q;
        $this->createSeo();
        SEO::setTitle('Tìm kiếm từ khóa: '.$request->q);

        $data = Products::where(function ($query) use ($request) {
            return $query->where('name', 'like', '%' . $request->q . '%');
        })->where('status', 1)->orderBy('createdDateTime', 'DESC')->paginate(15);

        $filter = Attributes::where('categoryId', 0)->get();

        $rooms = Rooms::where('status', 1)->orderBy('created_at', 'DESC')->take(10)->get();

        return view('frontend.pages.search', compact('data', 'q', 'filter', 'rooms'));
    }

    public function getFilterProductsAjax(Request $request)
    {
        $category = $request->category;

        $dataProduct  = Products::where('status', 1);

        if(isset($category)){

            $dataProduct = $dataProduct->where('categoryId', $category);
        }


        if ($request->price_checked) {
            $price = $request->price_checked;

            $filter = explode('-', $price);

            $array = [];
            foreach ($filter as $item) {
                $array = array_merge($array, json_decode($item));
            }

            $price_min = min($array);

            $price_max = max($array);

            $dataProduct = $dataProduct->where('price', '>=' , $price_min)->where('price', '<=', $price_max);
        }

        if ($request->color_checked) {
            $color = $request->color_checked;
            $filter = explode(',', $color);

            $dataProduct = $dataProduct->whereIn('color', $filter);
        }

        if ($request->collection_checked) {
            $collection = $request->collection_checked;
            $filter = explode(',', $collection);

            $dataProduct = $dataProduct->whereIn('collection', $filter);
        }

        if ($request->designer_checked) {
            $designer = $request->designer_checked;
            $filter = explode(',', $designer);

            $dataProduct = $dataProduct->whereIn('designer', $filter);
        }

        if ($request->fabric_material_checked) {
            $fabric_material = $request->fabric_material_checked;
            $filter = explode(',', $fabric_material);

            $dataProduct = $dataProduct->whereIn('fabric_material', $filter);
        }

        $data = $dataProduct->orderBy('createdDateTime', 'DESC')->paginate(15);

        return view('frontend.pages.ajax-products', compact('data'))->render();
    }


    // Sản phẩm
    public function getListProduct()
    {
        $data = Products::where('typeId', 1)->orderBy('createdDateTime', 'DESC')->paginate(15);

        $filter = Attributes::where('categoryId', 0)->get();

        $rooms = Rooms::where('status', 1)->orderBy('created_at', 'DESC')->take(10)->get();

        return view('frontend.pages.archives-product', compact('data', 'filter', 'rooms'));
    }

    public function getSingleProduct($slug)
    {
        $data = Products::where('slug', $slug)->firstOrFail();

        $this->createSeoPost($data);

        $this->addRecentlyViewedData($data->id);

        $product_relation = Products::where('id', '!=', $data->id)->where('categoryId', $data->categoryId)
        ->where('status', 1)->orderBy('createdDateTime', 'DESC')->take(8)->get();

        $inventory = Inventory::where('productId', $data->idNhanh)->where('depotId', NULL)->first();


        return view('frontend.pages.single-product-other', compact('data', 'inventory', 'product_relation'));

    }

    public function getCategoryProduct($slug)
    {
        $cate_detail = Categories::where('slug', $slug)->first();

        if (count($cate_detail->get_child_cate())) {
            $categoryId = $cate_detail->id;
        } else {
            $categoryId = $cate_detail->getParent()->id;
        }

        $this->createSeoPost($cate_detail);

        $filter = Attributes::where('categoryId', $categoryId)->get();

        $data = Products::where('categoryId', $cate_detail->categoryId)->orWhere('categoryId', $cate_detail->id)->where('typeId', 1)->orderBy('createdDateTime', 'DESC')->paginate(15);

        $rooms = Rooms::where('status', 1)->orderBy('created_at', 'DESC')->take(10)->get();

        return view('frontend.pages.archives-product', compact('cate_detail', 'data', 'filter', 'rooms'));
    }

    public function addRecentlyViewedData($id)
    {
        $data_list = [];
        if (session()->has('data_viewed')) {
            $data_list = session('data_viewed');
        }
        if (count($data_list)) {
            foreach ($data_list as $value) {
                if ($value == $id) {
                    return true;
                }
            }
        }
        $data_list[] = $id;
        session(['data_viewed' => $data_list]);
        return true;
    }

    // Đặt hàng

    public function postAddCart(Request $request)
    {
        $idProduct   = $request->id_product;
        $dataProduct = Products::findOrFail($idProduct);
        $inventory = Inventory::where('productId', $dataProduct->idNhanh)->where('depotId', NULL)->first();
        $dataCart    = [
            'id'      => $dataProduct->id,
            'name'    => $dataProduct->name,
            'qty'     => 1,
            'price'   => !empty($dataProduct->sale_price) ? $dataProduct->sale_price : $dataProduct->price,
            'weight'  => 0,
            'options' => [
                'image'       => $dataProduct->image,
                'slug'        => $dataProduct->slug,
                'code'        => $dataProduct->code,
                'idNhanh'     => $dataProduct->idNhanh,
                'qty_remain'  => !empty($inventory->remain) ? $inventory->remain : '',
            ],
        ];

        Cart::add($dataCart);

        return back()->with([
            'level' => 'success',
            'message' => 'Thêm vào giỏ hàng thành công.'
        ]);
    }

    public function postAddCartMore(Request $request)
    {
        $arrrayProduct = json_decode($request->id_product);
        foreach ($arrrayProduct as $item) {
            $dataProduct = Products::findOrFail($item);
            $inventory = Inventory::where('productId', $dataProduct->idNhanh)->where('depotId', NULL)->first();
            $dataCart    = [
                'id'      => $dataProduct->id,
                'name'    => $dataProduct->name,
                'qty'     => 1,
                'price'   => !empty($dataProduct->sale_price) ? $dataProduct->sale_price : $dataProduct->price,
                'weight'  => 0,
                'options' => [
                    'image'       => $dataProduct->image,
                    'slug'        => $dataProduct->slug,
                    'code'        => $dataProduct->code,
                    'idNhanh'     => $dataProduct->idNhanh,
                    'qty_remain'  => $inventory->remain,
                ],
            ];

            Cart::add($dataCart);
        }

        return back()->with([
            'level' => 'success',
            'message' => 'Thêm vào giỏ hàng thành công.'
        ]);
    }

    public function getCart()
    {
        SEO::setTitle('Giỏ hàng');

        $city = City::all();

        return view('frontend.pages.cart', compact('city'));
    }

    public function getUpdateCart(Request $request)
    {
        Cart::update($request->id, $request->qty);

        $item = Cart::get($request->id);

        $error = '';
        if ($item->qty > $item->options->qty_remain) {
            $error = '<span class="w-6 h-6 flex justify-center items-center">
                <svg width="18" height="18" viewbox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.76575 0.982572C10.0087 1.08325 10.2295 1.23081 10.4154 1.41682L16.5834 7.58382C16.7695 7.76976 16.9172 7.99057 17.018 8.23362C17.1188 8.47668 17.1706 8.73721 17.1706 9.00032C17.1706 9.26344 17.1188 9.52397 17.018 9.76702C16.9172 10.0101 16.7695 10.2309 16.5834 10.4168L10.4154 16.5838C10.2295 16.7698 10.0087 16.9174 9.76575 17.0181C9.52278 17.1187 9.26237 17.1706 8.99937 17.1706C8.73638 17.1706 8.47596 17.1187 8.23299 17.0181C7.99003 16.9174 7.76929 16.7698 7.58337 16.5838L1.41537 10.4168C1.22921 10.2309 1.08152 10.0101 0.980754 9.76702C0.87999 9.52397 0.828125 9.26344 0.828125 9.00032C0.828125 8.73721 0.87999 8.47668 0.980754 8.23362C1.08152 7.99057 1.22921 7.76976 1.41537 7.58382L7.58337 1.41682C7.76929 1.23081 7.99003 1.08325 8.23299 0.982572C8.47596 0.881896 8.73638 0.830078 8.99937 0.830078C9.26237 0.830078 9.52278 0.881896 9.76575 0.982572ZM8.29226 10.7069C8.4798 10.8945 8.73415 10.9998 8.99937 10.9998C9.26458 10.9998 9.51894 10.8945 9.70647 10.7069C9.89401 10.5194 9.99937 10.265 9.99937 9.99982V4.99982C9.99937 4.7346 9.89401 4.48025 9.70647 4.29271C9.51894 4.10517 9.26458 3.99982 8.99937 3.99982C8.73415 3.99982 8.4798 4.10517 8.29226 4.29271C8.10472 4.48025 7.99937 4.7346 7.99937 4.99982V9.99982C7.99937 10.265 8.10472 10.5194 8.29226 10.7069ZM8.29226 13.7069C8.4798 13.8945 8.73415 13.9998 8.99937 13.9998C9.26458 13.9998 9.51894 13.8945 9.70647 13.7069C9.89401 13.5194 9.99937 13.265 9.99937 12.9998C9.99937 12.7346 9.89401 12.4802 9.70647 12.2927C9.51894 12.1052 9.26458 11.9998 8.99937 11.9998C8.73415 11.9998 8.4798 12.1052 8.29226 12.2927C8.10472 12.4802 7.99937 12.7346 7.99937 12.9998C7.99937 13.265 8.10472 13.5194 8.29226 13.7069Z" fill="#E0433A" />
                </svg>

                </span>
                <span>
                    Sản phẩm không đủ
                </span>';
        }

        $price_new = number_format($item->qty*$item->price, 0, '.', '.').'đ';

        $total =  Cart::total();

        $total_new = $total;

        return response()->json([
            'total_new'=> number_format($total_new, 0, '.', '.'),
            'price_new'=> $price_new,
            'total' => number_format($total, 0, '.', '.'),
            'count' => Cart::count().' sản phẩm',
            'total_count' => 'Giỏ hàng ('.Cart::count().')',
            'error' => $error
        ]);
    }

    public function getRemoveCart($row)
    {
        Cart::remove($row);

        return redirect()->back()->with(['toastr' => 'Đã xóa sản phẩm khỏi giỏ hàng']);
    }

    public function getCheckCart()
    {
        $arrayProduct = [];

        foreach (Cart::content() as $item) {
            $inventory = Inventory::where('productId', $item->options->idNhanh)->where('depotId', NULL)->first();
            if ($inventory->available == 0 || $inventory->available < $item->qty) {
                $arrayProduct[] = [
                    'name' => $item->name,
                    'message' => 'Sản phẩm không đủ hoặc đang hết hàng'
                ];
            }
        }
        $message = '';

        foreach ($arrayProduct as $item) {
            $message = $message . $item['name'] . ': ' . $item['message'] .'. ';
        }

        return response()->json([
            'message' => $message
        ]);
    }

    public function postCheckOut(CheckoutRequest $request)
    {
        if (Cart::count())
        {
            $order                  = new Order;
            $order->code = generateRandomCode();
            $order->name     = $request->name;
            $order->phone     = $request->phone;
            $order->email     = $request->email;
            $order->id_city     = $request->city;
            $order->id_district     = $request->district;
            $order->id_ward     = $request->ward;
            $order->address     = $request->address;
            $order->totalPrice     = Cart::total();
            $order->type            = $request->type_pay;
            $order->status          = 1;
            $order->note            = $request->note ? $request->note : NULL;
            $order->domain = url('/');
            $order->save();

            foreach (Cart::content() as $item) {
                $orderDetail                   = new OrderDetail;
                $orderDetail->id_order         = $order->id;
                $orderDetail->id_product       = $item->id;
                $orderDetail->qty              = $item->qty;
                $orderDetail->price            = $item->price;
                $orderDetail->total            = $item->price * $item->qty;
                $orderDetail->save();

                $inventory = Inventory::where('productId', $item->options->idNhanh)->where('depotId', NULL)->first();
                 if (!empty($inventory)) {
                    $inventory->remain = $item->qty <= $inventory->remain ? $inventory->remain - $item->qty : 0;
                    $inventory->available = $item->qty <= $inventory->available ? $inventory->available - $item->qty : 0;
                    $inventory->save();
                 }

                $depot = Inventory::where('productId', $item->options->idNhanh)->where('depotId', '!=', NULL)->get();
                if (!empty($depot)) {
                    foreach ($depot as $value) {
                        Inventory::where('productId', $item->options->idNhanh)->where('depotId', $value->depotId)->update([
                            'remain' => $item->qty <= $value->remain ? $value->remain - $item->qty : 0,
                            'available' => $item->qty <= $value->available ? $value->available - $item->qty : 0
                        ]);
                    }
                }

            }

            $dataMail = [
                'name'        => $request->name,
                'email'       => $request->email,
                'phone'       => $request->phone,
                'address'     => $request->address,
                'cart'        => Cart::content(),
                'total'       => Cart::total(),
            ];

            $email_admin = getOptions('general', 'email_admin');

            Mail::send('frontend.mail.mail-order', $dataMail, function ($msg) use($email_admin, $request) {
                $msg->from('vunamc1601@gmail.com', 'Website - Vnconcept');
                $msg->to(@$email_admin, 'Website - Vnconcept')->subject('Thông báo đơn hàng mới');
                $msg->to($request->email, 'Website - Vnconcept')->subject('Thông báo đơn hàng mới');
            });

            Cart::destroy();

            $message = 'Đặt hàng thành công,chúng tôi sẽ liên lạc tới bạn để xác nhận giao hàng trong thời gian sớm nhất.';

            return response()->json([
                'success'=>true,
                'message'=> $message
            ]);
        }
    }

    // Rooms
    public function getRooms()
    {
        SEO::setTitle('Rooms');

        $data = Rooms::where('status', 1)->first();

        $list_product = json_decode($data->list_product);

        $product = Products::whereIn('id', $list_product)->where('status', 1)->get();

        $description = '';
        $productId = [];

        foreach ($product as $item) {
            $description = $description . $item->name. ', ';
            $productId[] = $item->id;
        }

        $rooms_same = Rooms::where('id', '!=', $data->id)->where('categoryId', $data->categoryId)->orderBy('created_at', 'DESC')->get();

        return view('frontend.pages.rooms', compact('data', 'product', 'description', 'rooms_same', 'productId'));
    }

    public function getSingleRooms($slug)
    {
        $data = Rooms::where('slug', $slug)->where('status', 1)->first();

        $this->createSeoPost($data);

        $list_product = json_decode($data->list_product);

        $product = Products::whereIn('id', $list_product)->where('status', 1)->get();

        $description = '';

        foreach ($product as $item) {
            $description = $description . $item->name. ', ';
        }

        $rooms_same = Rooms::where('id', '!=', $data->id)->where('categoryId', $data->categoryId)->orderBy('created_at', 'DESC')->get();

        return view('frontend.pages.rooms', compact('data', 'product', 'description', 'rooms_same'));

    }

    // Collection
    public function getCollection()
    {
        SEO::setTitle('Collection');

        $data = Collection::where('status', 1)->first();

        $list_product = json_decode($data->list_product);

        $product = Products::whereIn('id', $list_product)->where('status', 1)->get();

        $description = '';
        $productId = [];

        foreach ($product as $item) {
            $description = $description . $item->name. ', ';
            $productId[] = $item->id;
        }

        $collection_same = Collection::where('id', '!=', $data->id)->where('categoryId', $data->categoryId)->orderBy('created_at', 'DESC')->get();

        return view('frontend.pages.collection', compact('data', 'product', 'description', 'collection_same', 'productId'));
    }

    public function getSingleCollection($slug)
    {
        $data = Collection::where('slug', $slug)->where('status', 1)->first();

        $this->createSeoPost($data);

        $list_product = json_decode($data->list_product);

        $product = Products::whereIn('id', $list_product)->where('status', 1)->get();

        $description = '';

        foreach ($product as $item) {
            $description = $description . $item->name. ', ';
        }

        $collection_same = Collection::where('id', '!=', $data->id)->where('categoryId', $data->categoryId)->orderBy('created_at', 'DESC')->get();

        return view('frontend.pages.collection', compact('data', 'product', 'description', 'collection_same'));

    }


}
