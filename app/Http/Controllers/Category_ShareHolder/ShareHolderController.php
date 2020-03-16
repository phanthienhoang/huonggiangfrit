<?php
namespace App\Http\Controllers\Category_ShareHolder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shareholder;
use App\Category_Shareholder_Tran;
use App\Shareholder_Tran;
use App;
use Illuminate\Support\Facades\Session;


class ShareHolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTranslation($locale)
    {
        return Shareholder_Tran::where('locale',$locale)->get();
    }
    public function index()
    {   
        if (App::getLocale() == "en") {
            $atributes  = $this->getTranslation('en');
        } else {
            $atributes  = $this->getTranslation('vi');
        }
        return view('back_end.tables.shareholder',compact(['atributes']));
    }
    /**
     * Show the form for creating a new resource.,
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shareholder = Shareholder::all();
        return view('back_end.forms.Shareholder.create',compact('shareholder'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $shareholder = new Shareholder;
        $input = $request->input('online');
        $shareholder->online=$input;
        $shareholder->category_id=$request->input('category');
        $shareholder->save();

        $last_id =$shareholder->id;

        $atribute = $request->all();
        if ($request->hasFile('images')) {
            $image=base64_encode(file_get_contents($request->file("images")));
            $atribute['images']="data:image/jpg;base64,".$image;
        }
        $atribute['shareholder_id']=$last_id;
        // dd($atribute);
        if($atribute['locale']=='vi'){
            Shareholder_Tran::create($atribute);
            $atribute['locale']='en';
            $atribute['status']=0;
            $atribute['title']='please update english';
            $atribute['contents']='please update english';
            Shareholder_Tran::create($atribute);
            $message = "Tạo mới thành công! xin hãy cập nhập ngôn ngữ tiếng anh";
        }else{
            Shareholder_Tran::create($atribute);
            $atribute['locale']='vi';
            $atribute['status']=0;
            $atribute['title']='cập nhập bài viết tiếng việt';
            $atribute['contents']='cập nhập bài viết tiếng việt';
            Shareholder_Tran::create($atribute);
            $message = "create-success ! please update vietnam language";

        }
        Session::flash('create-success',$message);

        return redirect()->route('admin.shareholder.index');
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
        $atribute = Shareholder_Tran::findOrFail($id);
        return view('back_end.forms.shareholder.edit',compact(['atribute']));
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
        $product = Shareholder_Tran::find($id);
        $product->update($atribute);
        return redirect()->route('admin.shareholder.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   

        $shareholder_Tran = Shareholder_Tran::find($id);
        $shareholder_id = $shareholder_Tran['shareholder_id'];

        $shareholder = Shareholder::find($shareholder_id);

        $shareholder ->delete();

        foreach($shareholder->Shareholder_Translates as $key=>$value){
            $value->delete();
        }

        return redirect(route('admin.shareholder.index'));
    }

    public function getShareholderCategory(){

        $locale = request('locale');
        $data = Category_Shareholder_Tran::where('locale', $locale)->get();

        if(request()->ajax()){
            return response()->json($data);
        }
    }

}