<?php
namespace App\Http\Controllers\Category_Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category_product;
use App\Category_product_tran;
use App\Language;
use App;
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
        $category_product = new Category_product;
        $input = $request->input('online');
        $category_product->online=$input;
        $category_product->save();
        $last_id =$category_product->id;
        $atribute = $request->all();
        $image=base64_encode(file_get_contents($request->file("images")));
        $atribute['images']="data:image/jpg;base64,".$image;
        $atribute['category_id']=$last_id;
        if($atribute['locale']=='vi'){
            Category_product_tran::create($atribute);
            $atribute['locale']='en';
            $atribute['status']=0;
            $atribute['name']='null';
            $atribute['description']='null';
            $atribute['contents']='null';
            Category_product_tran::create($atribute);
        }else{
            Category_product_tran::create($atribute);
            $atribute['locale']='vi';
            $atribute['status']=0;
            $atribute['name']='null';
            $atribute['description']='null';
            $atribute['contents']='null';
            Category_product_tran::create($atribute);
        }
        return redirect()->route('admin.category-products.index');
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
        $categoryProduct = Category_product_tran::findOrFail($id);
        return view('back_end.forms.category_product.edit',compact(['categoryProduct']));
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
        $atribute = $request->all();
        if ($request->hasFile('images')) {
            $image=base64_encode(file_get_contents($request->file("images")));
            $atribute['images']="data:image/jpg;base64,".$image;
        }
        $product = Category_product_tran::find($id);
        $product->update($atribute);
        return redirect()->route('admin.category-products.index');
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

        return redirect(route('admin.category-products.index'));
    }
}