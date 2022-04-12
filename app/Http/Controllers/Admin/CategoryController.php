<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;

class CategoryController extends Controller
{
    protected function fields()
    {
        return [
            'name' => "required",
            // 'code' => "required",
        ];
    }

    protected function messages()
    {
        return [
            'name.required' => 'Tên danh mục không được bỏ trống.',
            // 'code.required' => 'Mã danh mục không được bỏ trống.',
        ];
    }


    protected function module(){
        return [
            'name' => 'Danh mục sản phẩm',
            'module' => 'category',
            'table' =>[
                'name' => [
                    'title' => 'Tiêu đề',
                    'with' => '',
                ],
                'slug' => [
                    'title' => 'Liên kết',
                    'with' => '',
                ],
            ]
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['module'] = $this->module();
        $data['data'] = Categories::where('type', 'product_category')->get();

        return view("backend.{$this->module()['module']}.list", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['module'] = $this->module();
        $data['categories'] = Categories::where('type', 'product_category')->get();
        return view("backend.{$this->module()['module']}.create-edit", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->fields(), $this->messages());

        $post_check_sulg = Categories::where('slug', $request->slug)->where('type', 'product_category')->first();
        if (!empty($post_check_sulg)) {
            return redirect()->back()->withInput()->withErrors(['Đường đẫn tĩnh này đã tồn tại.']);
        }

        $input = $request->all();

        $input['categoryId'] = generateRandomCodeOTP();

        $input['type'] = 'product_category';

        Categories::create($input);

        flash('Thêm mới thành công.')->success();

        return redirect()->route("{$this->module()['module']}.index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['module'] = array_merge($this->module(),[
            'action' => 'update'
        ]);

        $data['data'] = Categories::findOrFail($id);

        return view("backend.{$this->module()['module']}.create-edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, $this->fields(), $this->messages());

        $input = $request->all();

        $input['slug'] = str_slug($request->name);

        $input['type'] = 'product_category';

        $input['showHome'] = $request->showHome == 1 ? 1 : NULL;

        Categories::findOrFail($id)->update($input);

        flash('Cập nhật thành công.')->success();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::find($id)->get_child_cate();

        if(count($category)){

            flash('Không thể xóa danh mục này vì danh mục này đang có danh mục con.')->error();
            return redirect()->route('category.index');

        }else {

            Categories::destroy($id);

            flash('Xóa thành công.')->success();

            return redirect()->route('category.index');

        }
    }

    public function syncData()
    {
        $parameter = getParameter();
        $postArray = array(
            "version" => "2.0",
            "appId" => $parameter['appId'],
            "businessId" => $parameter['businessId'],
            "accessToken" => $parameter['accessToken'],
        );

        $curl = curl_init("https://open.nhanh.vn/api/product/category");
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postArray);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $curlResult = curl_exec($curl);

        if(! curl_error($curl)) {
            // success
            $response = json_decode($curlResult);

            $arrayCate = [];
            $category = Categories::all();

            foreach ($category as $item) {
                $arrayCate[] = $item->categoryId;
            }


            foreach ($response->data as $item) {
                if (in_array($item->id, $arrayCate)) {
                    Categories::where('categoryId', $item->id)->update([
                        'categoryId' => $item->id ? $item->id : null,
                        'parentId' => $item->parentId ? $item->parentId : null,
                        'name' => $item->name ? $item->name : null,
                        'code' => $item->code ? $item->code : null,
                        'order' => $item->order ? $item->order : null,
                        'showHome' => $item->showHome ? $item->showHome : null,
                        'showHomeOrder' => $item->showHomeOrder ? $item->showHomeOrder : null,
                        'privateId' => $item->privateId ? $item->privateId : null,
                        'image' => $item->image ? $item->image : null,
                        'content' => $item->content ? $item->content : null,
                        'type' => 'product_category',
                        'slug' => str_slug($item->name),
                    ]);
                    // childs
                    if (count($item->childs)) {
                        foreach ($item->childs as $value) {
                            Categories::where('categoryId', $value->id)->update([
                                'categoryId' => $value->id ? $value->id : null,
                                'parentId' => $value->parentId ? $value->parentId : null,
                                'name' => $value->name ? $value->name : null,
                                'code' => $value->code ? $value->code : null,
                                'order' => $value->order ? $value->order : null,
                                'showHome' => $value->showHome ? $value->showHome : null,
                                'showHomeOrder' => $value->showHomeOrder ? $value->showHomeOrder : null,
                                'privateId' => $value->privateId ? $value->privateId : null,
                                'image' => $value->image ? $value->image : null,
                                'content' => $value->content ? $value->content : null,
                                'type' => 'product_category',
                                'slug' => str_slug($value->name),
                            ]);
                        }
                    }
                } else {
                    Categories::create([
                        'categoryId' => $item->id ? $item->id : null,
                        'parentId' => $item->parentId ? $item->parentId : null,
                        'name' => $item->name ? $item->name : null,
                        'code' => $item->code ? $item->code : null,
                        'order' => $item->order ? $item->order : null,
                        'showHome' => $item->showHome ? $item->showHome : null,
                        'showHomeOrder' => $item->showHomeOrder ? $item->showHomeOrder : null,
                        'privateId' => $item->privateId ? $item->privateId : null,
                        'image' => $item->image ? $item->image : null,
                        'content' => $item->content ? $item->content : null,
                        'type' => 'product_category',
                        'slug' => str_slug($item->name),
                    ]);
                    // childs
                    if (count($item->childs)) {
                        foreach ($item->childs as $value) {
                            Categories::create([
                                'categoryId' => $value->id ? $value->id : null,
                                'parentId' => $value->parentId ? $value->parentId : null,
                                'name' => $value->name ? $value->name : null,
                                'code' => $value->code ? $value->code : null,
                                'order' => $value->order ? $value->order : null,
                                'showHome' => $value->showHome ? $value->showHome : null,
                                'showHomeOrder' => $value->showHomeOrder ? $value->showHomeOrder : null,
                                'privateId' => $value->privateId ? $value->privateId : null,
                                'image' => $value->image ? $value->image : null,
                                'content' => $value->content ? $value->content : null,
                                'type' => 'product_category',
                                'slug' => str_slug($value->name),
                            ]);
                        }
                    }
                }

            }

            flash('Đồng bộ dữ liệu thành công.')->success();

            return back();

        } else {
            // failed, cannot connect nhanh.vn
            $response = new \stdClass();
            $response->code = 0;
            $response->messages = array(curl_error($curl));
        }
        curl_close($curl);

        if ($response->code == 1) {
            // send product successfully
        } else {
            // failed, show error messages
            if(isset($response->messages) && is_array($response->messages)) {
                foreach($response->messages as $message) {
                    flash($message)->error();
                }
            }
        }
    }

}
