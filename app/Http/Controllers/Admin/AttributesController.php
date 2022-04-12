<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attributes;
use App\Models\Categories;

class AttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getListCategory()
    {
        $data['category'] = Categories::where('parentId', NULL)->get();
        
        return view("backend.filter.list-category", $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Attributes::where('categoryId', $request->category)->get();

        $attributes = [];

        if (!empty($data)) {
            foreach ($data as $item) {
                $attributes[] = $item->name;
            }
        }

        return view('backend.filter.list', compact('data', 'attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => "required",
        ], [
            'name.required' => 'Bạn chưa chọn bộ lọc.',
        ]);

        $data = Attributes::where('categoryId', $request->categoryId)->get();

        if (!empty($data)) {
            Attributes::where('categoryId', $request->categoryId)->delete();
            
            foreach ($request->name as $item) {
                $attributes = new Attributes;
                $attributes->name = $item;
                $attributes->categoryId = $request->categoryId;
                if ($item == 'Giá') {
                    $attributes->type = 'price';
                } else {
                    $attributes->type = 'attribute';
                }
                $attributes->save();
            }

            flash('Cập nhật thành công.')->success();

        } else {
            dd('1');
            foreach ($request->name as $item) {
                $attributes = new Attributes;
                $attributes->name = $item;
                $attributes->categoryId = $request->categoryId;
                if ($item == 'Giá') {
                    $attributes->type = 'price';
                } else {
                    $attributes->type = 'attribute';
                }
                $attributes->save();
            }
    
            flash('Thêm mới thành công.')->success();
        }

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Attributes::findOrFail($id);

        return view('backend.filter.edit', compact('data'));
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
        $this->validate($request, [
            'content' => 'required',
        ],[
            'content.required' => 'Bạn chưa nhập giá trị cho bộ lọc',
        ]);
        $data = Attributes::findOrFail($id);
        $data->name = $request->name;
        $data->content = !empty($request->content) ? json_encode( $request->content ) : null;
        $data->save();
        
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
        Attributes::destroy($id);
        flash('Xóa thành công.')->success();

        return back();
    }
}
