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
use App\Models\Image;
use App\Models\Products;
use App\Models\Customer;
use App\Models\Posts;
use App\Models\Contact;
use App\Models\Categories;

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


            // $menuHeader = Menu::where('id_group', 1)->orderBy('position')->get();
            // $menuFooter = Menu::where('id_group', 2)->orderBy('position')->get();


            view()->share(compact('site_info'));
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

    	return view('frontend.pages.home', compact('category'));
    }

    public function getSearch(Request $request)
    {
        $q = $request->q;
        $this->createSeo();
        $dataSeo = Pages::where('type', 'news')->first();
        SEO::setTitle('Tìm kiếm từ khóa: '.$request->q);
        $data = Posts::where(function ($query) use ($request) {
            return $query->where('name', 'like', '%' . $request->q . '%');
        })->where('status', 1)->orderBy('created_at', 'DESC')->paginate(15);

        return view('frontend.pages.search', compact('dataSeo', 'data', 'q'));
    }

    public function getListProduct()
    {
        $data = Products::where('typeId', 1)->paginate(15);

        return view('frontend.pages.archives-product', compact('data'));
    }

    public function getSingleProduct($slug)
    {
        $data = Products::where('previewLink', '/'.$slug)->firstOrFail();

        return view('frontend.pages.single-product', compact('data'));
    }

    public function getListPrice() {
        $dataSeo = Pages::where('type', 'price-list')->first();
        $this->createSeo($dataSeo);
        $category_service = Service::where('status', 1)->where('hot', 1)->orderBy('created_at', 'DESC')->take(3)->get();

        return view('frontend.pages.price', compact('dataSeo', 'category_service'));
    }

    //Dịch vụ
    public function getListService()
    {
        $dataSeo = Pages::where('type', 'services')->first();
        $this->createSeo($dataSeo);
        $contentHome = Pages::where('type', 'home')->first();
        $contentHome = json_decode(@$contentHome->content);

        $service_hot = Service::where('status', 1)->where('hot', 1)->orderBy('created_at', 'DESC')->get();

        $data = Service::where('status', 1)->where('hot', NULL)->orderBy('created_at', 'DESC')->get();

        return view('frontend.pages.archives-service', compact('dataSeo', 'contentHome', 'service_hot', 'data'));
    }

    public function getSingleService($slug)
    {
        $dataSeo = Pages::where('type', 'services')->first();
        $data = Service::where('status', 1)->where('slug', $slug)->firstOrFail();
        $this->createSeoPost($data);

        $service_related = Service::where('id', '!=', $data->id)->where('status', 1)->inRandomOrder()
                            ->orderBy('created_at', 'DESC')->take(3)->get();

        return view('frontend.pages.single-service', compact('dataSeo', 'data', 'service_related'));
    }

    // Tin tức
    public function getListNews()
    {
        $dataSeo = Pages::where('type', 'news')->first();
        $this->createSeo($dataSeo);
        $data = Posts::where('status', 1)->where('type', 'blog')->orderBy('created_at', 'DESC')->paginate(15);
        return view('frontend.pages.archives-news', compact('dataSeo', 'data'));
    }

    public function getSingleNews($slug)
    {
        $dataSeo = Pages::where('type', 'news')->first();
        $data = Posts::where('status', 1)->where('slug', $slug)->firstOrFail();
        $this->createSeoPost($data);

        $list_category = $data->category->pluck('id')->toArray();
        $category = Categories::where('id', $list_category)->first();
        $list_post_related = PostCategory::whereIn('id_category', $list_category)->get()->pluck('id_post')->toArray();

        $news_related = Posts::where('id', '!=', $data->id)->whereIn('id', $list_post_related)->where('status', 1)
                        ->where('type', 'blog')->orderBy('created_at', 'DESC')->take(3)->get();

        return view('frontend.pages.single-news', compact('dataSeo', 'data', 'news_related'));
    }

    public function getListPostCategory($slug) {
        $dataSeo = Pages::where('type', 'news')->first();
        $category = Categories::where('slug', $slug)->where('type', 'post_category')->first();
        $this->createSeoPost($category);

        $list_id_children = get_list_ids($category);
        $list_id_children[] = $category->id;
        $list_id_post = PostCategory::whereIn('id_category', $list_id_children)->get()->pluck('id_post')->toArray();
        $data = Posts::where('status', 1)->whereIn('id', $list_id_post)->orderBy('created_at', 'DESC')->paginate(16);

        // return view('frontend.pages.category-product', compact('dataSeo', 'category', 'data'));
    }

    public function getContact()
    {
        $dataSeo = Pages::where('type', 'contact')->first();
        $this->createSeo($dataSeo);
        return view('frontend.pages.contact', compact('dataSeo'));
    }

    public function postContact(Request $request)
    {
        $result = [];
        if ($request->name == '' || $request->name == null) {
            $result['message_name'] = 'Bạn chưa nhập họ tên';
        }
        if ($request->phone == '' || $request->phone == null) {
            $result['message_phone'] = 'Bạn chưa nhập số điện thoại';
        } else {
            if (!is_numeric($request->phone) || strlen($request->phone) != 10) {
                $result['message_phone'] = 'Vui lòng nhập đúng định dạng số điện thoại. Ví dụ: 0989888456';
            }
        }
        if ($request->address_from == '' || $request->address_from == null) {
            $result['message_address_from'] = 'Bạn chưa nhập địa chỉ vận chuyển';
        }
        if ($request->address_to == '' || $request->address_to == null) {
            $result['message_address_to'] = 'Bạn chưa nhập địa chỉ giao';
        }
        if ($request->time == '' || $request->time == null) {
            $result['message_time'] = 'Bạn chưa nhập thời gian';
        }

        if($result != []){
            return json_encode($result);
        }

        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
        ];

        $customer = Customer::create($data);
        $contact = new Contact;
        $contact->title = 'Liên hệ vận chuyển từ khách hàng';
        $contact->customer_id = $customer->id;
        $contact->address_from = $request->address_from;
        $contact->address_to = $request->address_to;
        $contact->time = $request->time;
        $contact->status = 0;
        $contact->save();

        $content_email = [
            'title' => 'Liên hệ vận chuyển từ khách hàng',
            'name' => $request->name,
            'phone' => $request->phone,
            'address_from' => $request->address_from,
            'address_to' => $request->address_to,
            'time' => $request->time,
            'url' => route('contact.edit', $contact->id),
        ];

        $email_admin = getOptions('general', 'email_admin');

        Mail::send('frontend.mail.mail-teamplate', $content_email , function ($msg) use ($email_admin) {

            $msg->from('vunamc1601@gmail.com', 'Website - Kiến vàng');

            $msg->to($email_admin)->subject('Liên hệ vận chuyển từ khách hàng');

        });

        $result['success'] = 'Gửi thông tin thành công, chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất. Xin cảm ơn !';

        return json_encode($result);
    }

}
