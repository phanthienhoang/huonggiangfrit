<?php
namespace App\Http\Controllers\Category_Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category_product;
use App\Category_product_tran;
use App\Language;
use App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTranslation($locale)
    {
        return Category_product_tran::where('locale',$locale)->get();
    }

    public function index()
    {   
        if (App::getLocale() == "en") {
            $categoryProducts  = $this->getTranslation('en');
        } else {
            $categoryProducts  = $this->getTranslation('vi');
        }
        return view('back_end.tables.category_product',compact(['categoryProducts']));
    }
    /**
     * Show the form for creating a new resource.,
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_product = Category_product::all();
        // dd($category_product);
        return view('back_end.forms.category_product.create',compact('category_product'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validateAttribute();

        $category_product = new Category_product;
        $category_product->save();
        $last_id =$category_product->id;
        $atribute = $request->all();
        $image=base64_encode(file_get_contents($request->file("images")));
        $atribute['images']="data:image/jpg;base64,".$image;
        $atribute['category_id']=$last_id;

        $slug = Str::slug($atribute['name']);

        $atribute['slug'] = $slug;
        if($atribute['locale']=='vi'){
            Category_product_tran::create($atribute);
            $atribute['locale']='en';
            $atribute['status']=0;
            $atribute['description']='hãy cập nhập tiếng anh cho tôi';
            $atribute['contents']='null';
            Category_product_tran::create($atribute);
            $message = "Tạo mới thành công! xin hãy cập nhập ngôn ngữ tiếng anh";
        }else{
            Category_product_tran::create($atribute);
            $atribute['locale']='vi';
            $atribute['status']=0;
            $atribute['description']='hãy cập nhập tiếng việt cho tôi';
            $atribute['contents']='null';
            Category_product_tran::create($atribute);
            $message = "create-success ! please update vietnam language";
        }

        Session::flash('create-success',$message);
        return redirect()->route('category-products.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $atribute = Category_product_tran::findOrFail($id);
        return view('back_end.showdetail.detailCategoryProduct',compact(['atribute']));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $atribute = Category_product_tran::findOrFail($id);
        return view('back_end.forms.category_product.edit',compact(['atribute']));
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
        // $this->validateAttribute();
        
        $atribute = $request->all();
        $slug = Str::slug($atribute['name']);
        $atribute['slug'] = $slug;
        if ($request->hasFile('images')) {
            $image=base64_encode(file_get_contents($request->file("images")));
            $atribute['images']="data:image/jpg;base64,".$image;
        }

        $product = Category_product_tran::find($id);
        $product->update($atribute);
        $message = "update thành công";

        Session::flash('create-success',$message);

        return redirect()->route('category-products.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate_product_trans = Category_product_tran::find($id);

        $category_id = $cate_product_trans['category_id'];

        $cate_product = Category_product::find($category_id);
        $cate_product ->delete();

        foreach($cate_product->category_product_tran as $key=>$value){
            $value->delete();
        }

        foreach($cate_product->product as $key=>$value){
            $value->delete();
            $value->productTranslates()->delete();
        }

        return redirect(route('category-products.index'));
    }

    public function getDeleted(){
        $deletedCategories = Category_product_tran::onlyTrashed()->where('locale', session()->get('language'))->get();


        return view('back_end.tables.deleted.category_product', compact('deletedCategories'));
    }

    public function restore($id)
    {
        $cateTrans = Category_product_tran::onlyTrashed()->find($id);

        $category = Category_product::onlyTrashed()->find($cateTrans->category_id);
        $category->restore();
        $category->category_product_tran()->restore();

        return redirect(route('category-products.index'));
    }

    public function forceDelete($id)
    {
        $cateTrans = Category_product_tran::onlyTrashed()->find($id);

        $category = Category_product::onlyTrashed()->find($cateTrans->category_id);
        $category->forceDelete();
        $category->category_product_tran()->forceDelete();

        return redirect(route('category-products.index'));
    }

    public function validateAttribute()
    {
        return request()->validate([
            'name' => 'required',
            'contents' => 'required',
            'description' => 'required',
            'status' =>'required',
            'images' => 'required|image',
            'locale' => 'required'
        ]);
    }
}