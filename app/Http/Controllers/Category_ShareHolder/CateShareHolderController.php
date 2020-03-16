<?php
namespace App\Http\Controllers\Category_ShareHolder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category_Shareholder;
use App\Category_Shareholder_Tran;
use App;
use Illuminate\Support\Facades\Session;

class CateShareHolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTranslation($locale)
    {
        return Category_Shareholder_Tran::where('locale',$locale)->get();
    }
    public function index()
    {   
        if (App::getLocale() == "en") {
            $atributes  = $this->getTranslation('en');
        } else {
            $atributes  = $this->getTranslation('vi');
        }
        return view('back_end.tables.category_shareholder',compact(['atributes']));
    }
    /**
     * Show the form for creating a new resource.,
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_Shareholder = Category_Shareholder::all();
        return view('back_end.forms.Category_Shareholder.create',compact('category_Shareholder'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $category_Shareholder = new Category_Shareholder;
        $input = $request->input('online');
        $category_Shareholder->online=$input;
        $category_Shareholder->save();
        $last_id =$category_Shareholder->id;
        $atribute = $request->all();
        $atribute['category_id']=$last_id;
        if($atribute['locale']=='vi'){
            Category_Shareholder_Tran::create($atribute);
            $atribute['locale']='en';
            $atribute['status']=0;
            $atribute['title']='null';
            Category_Shareholder_Tran::create($atribute);
            $message = "Tạo mới thành công! xin hãy cập nhập ngôn ngữ tiếng anh";
        }else{
            Category_Shareholder_Tran::create($atribute);
            $atribute['locale']='vi';
            $atribute['status']=0;
            $atribute['title']='null';
            Category_Shareholder_Tran::create($atribute);
            $message = "create-success ! please update vietnam language";
        }

        Session::flash('create-success',$message);
        return redirect()->route('admin.category-shareholder.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $atribute = Category_Shareholder_Tran::findOrFail($id);
        return view('back_end.forms.Category_Shareholder.edit',compact(['atribute']));
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
        $product = Category_Shareholder_Tran::find($id);
        // dd($product);
        $product->update($atribute);
        // dd($product->update($atribute));
        return redirect()->route('admin.category-shareholder.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category_Shareholder_Tran = Category_Shareholder_Tran::find($id);

        $category_id = $category_Shareholder_Tran['category_id'];

        $category_Shareholder = Category_Shareholder::find($category_id);

        // dd($category_Shareholder);

        $category_Shareholder ->delete();

        foreach($category_Shareholder->category_shareholder_tran as $key=>$value){
            $value->delete();
        }
        return redirect(route('admin.category-shareholder.index'));
    }
}