<?php

namespace App\Http\Controllers;

use App\Models\Exchange;
use App\Models\pay_receipt;
use App\Models\Purchasesbill;
use App\Models\Salesbill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countsals = array(Salesbill::where('created_at','like','%'.date('Y-m-d').'%')->count(),Salesbill::select()->count());
        $countpur = array(Purchasesbill::where('created_at','like','%'.date('Y-m-d').'%')->count(),Purchasesbill::select()->count());
        $countpay = array(pay_receipt::where('created_at','like','%'.date('Y-m-d').'%')->count(),pay_receipt::select()->count());
        $countexc = array(Exchange::where('created_at','like','%'.date('Y-m-d').'%')->count(),Exchange::select()->count());
      
        return view('frontend/home',['countsals'=>$countsals,'countpur'=>$countpur,'countpay'=>$countpay,'countexc'=>$countexc]);
    }

    public function Register(Request $request){
        return view('frontend.register');
    }
    public function store(Request $request)
    {

        
        $roule = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['min:8'],
            'password_confirmation' => 'required_with:password|same:password|min:8',
            "user_type" =>["required"]
        ];
        $message = [
            'name.required' => "يجب ادخال الاسم ",
            'name.string' => "يجب ادخال الاسم نصي ",
            'name.max:255' => "الاسم اطول من المطلوب",
            'emil.required' => "يجب ادخال الايميل ",
            'email.string' => "يجب ادخال الايميل نصي ",
            'email.max:255' => "الايميل اطول من المطلوب",
            'email.unique' => "هذا الايميل مسجل مسبقا",
            'password_confirmation.required' => "يجب ادخال كلمة المرور ",
            'password.min' => "كلمةالمرور يجب ان تكون اطول من 8",
            'password_confirmation.min' => "كلمةالمرور يجب ان تكون اطول من 8",
            'password_confirmation.same' => "كلمة المرور يجب ان تكون مطابقة",
            'user_type.required' => "يجب ادخال نوع المستخدم"
        ];
        $request->validate($roule,$message);
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            "user_type"=>$request->user_type
        ]);
        return redirect()->route('users.index')->with('add',"تم الاضافة بنجاح");
    }
    public function deleteuser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('delete','تم الحذف بنجاح');
    }
}
