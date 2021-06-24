<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cookie;
use Carbon\Carbon;
//use App\Models\insertbook;

class librarymanage extends Controller
{
    

    public function createbook(Request $request){
        $bookno = DB::select('select bookno from insertbook order by bookno desc limit 1');
        if(empty($bookno)){
            $no = 0;
        }else{
            $no = $bookno[0]->bookno;
        }        
        $no = $no+1;
        $request->session()->put('no',$no);
        #Cookie::queue('bookno',$no,10);       
        return view('createbook');     
    }

    public function insertbook(Request $request){

        $validator = $request->validate([
            'bookname' => 'required',
            'bookisbn' => 'required',
            'bookpub' => 'required',
        ]);
        $bookno = $request->session()->get('no');  
        $bookname = $request['bookname'];
        $bookisbn = $request['bookisbn'];
        $bookpub = $request['bookpub'];
        $stock = 1;
        DB::insert('insert into insertbook(bookno,book_name,isbn_num,Pub_name,stock)values(?,?,?,?,?)',[$bookno,$bookname,$bookisbn,$bookpub,$stock]);

        return back()->with('message','Book Inserted Successfully');

    }
 
    public function checkbooks(){
        $books = DB::table('insertbook')->select('*')->get();

        return view('checkbooks')->with('books',$books);
    }

    public function searchbook(){
     return view('searchbook');   

    }

    public function searchb(Request $request){

        $validate = $request->validate([
            'bookname'=> 'required',
        ]);
        $bookname = $request['bookname'];
        if(DB::table('insertbook')->select('bookno','book_name','isbn_num','Pub_name')->where('book_name','LIKE',"%{$bookname}%") -> exists()){
            $values =  DB::table('insertbook')->select('bookno','book_name','isbn_num','Pub_name')->where('book_name','LIKE',"%{$bookname}%")->get();
            return back()->with('result',$values);
        }
        else{
            return back()->with('failresult','No Books Found in our library');
        }
       
    }

    public function aoe(){
        return view('aoe');
    }

    public function editb(Request $request){
        
        $validate = $request->validate([
            'bookname'=> 'required',
        ]);
        $bookname = $request['bookname'];
        if(DB::table('insertbook')->select('bookno','book_name','isbn_num','Pub_name','stock')->where('book_name','LIKE',"%{$bookname}%") -> exists()){
            $values =  DB::table('insertbook')->select('bookno','book_name','isbn_num','Pub_name','stock')->where('book_name','LIKE',"%{$bookname}%")->get();
            return back()->with('result',$values);
        }
        else{
            return back()->with('failresult','No Books Found in our library');
        }

    }

    public function editsearch(Request $request){
        $bookno = $request['bookno'];
        $bookdet=DB::select('select bookno,book_name,isbn_num,Pub_name,stock from insertbook where bookno = ?',[$bookno]);
        $request->session()->put('bookdet',$bookdet);
        #return $bookdet;
        return view('editbook');
      
    }

    public function updatebook(Request $request){
        $validate = $request->validate([
            'bookname' => 'required',
            'bookpub' => 'required',
            'stock' => 'required',        
        ]);
        $bookname = $request['bookname'];
        $bookpub = $request['bookpub'];
        $stock = $request['stock'];
        $bookno = $request->session()->get('bookdet');
        $bookno = $bookno[0]->bookno;    
        $update = DB::update('update insertbook set book_name = ? , Pub_name = ? , stock = ? where bookno = ?', [$bookname,$bookpub,$stock,$bookno]);
        $request->session()->put('succ','Successfully updated');
        return view('aoe');
    }

    public function bookout(Request $request){

        $books = DB::table('insertbook')->select('*')->get();    
        $request->session()->put('lendbook',$books);
        return view('bookout');
    }

    public function lend(Request $request){
        $validate = $request->validate([
            'name'=> 'required',
            'contact' => 'required',
            'address' => 'required',
            'fromdate' => 'required',
            'todate' => 'required',
            'bookno' => 'required',
        ]);

        $bookno = $request['bookno'];
        $name = $request['name'];
        $contact = $request['contact'];
        $address = $request['address'];
        $fromdate = $request['fromdate'];
        $todate = $request['todate'];        
        $veri = 0;
        do{
            $token = mt_rand(99999,999999);    
        }while(DB::table('lendbook')->where('token',$token)->exists());

        $insert = DB::insert('insert into lendbook(bookno,name,address,connum,fromdate,todate,token,veri) values (?,?,?,?,?,?,?,?)',[
            $bookno,$name,$address,$contact,$fromdate,$todate,$token,$veri
        ]);

        return back()->with('message',$token);
    }

    public function outstand(Request $request){
        //$date = Carbon::now()->format('y/m/d');
        $date = Carbon::now()->isoFormat('YYYY-MM-DD');
        $outstand = DB::table('lendbook')->select('*')->where([
            ['veri','=','0'],
            ['todate','<',$date]
        ])->get();
        $request->session()->put('lend',$outstand);
        return view('outstanding');

    }

    public function requestclose(){
        return view('requestclose');
    }
    public function closesearch(Request $request){
        $validate = $request->validate([
            'token' => 'required|min:4'
        ]);
        $token = $request['token'];
        if(DB::table('lendbook')->select('*')->where([
            ['token',$token],
            ['veri','0']
        ])->exists()){
            $details = DB::table('lendbook')->select('*')->where('token',$token)->get();
            // $request->session()->put('details',$details);
            return back()->with('details',$details);
        }
        else{
            return back()->with('message','No Lenders Found, check the token again');
        }
    }

    public function closereq(Request $request){
        $bookno = $request['close'];
        $token = $request['token'];
        DB::update('update lendbook set veri = 1 where bookno = ? and token = ?', [$bookno,$token]);
        return back()->with('messagee','Successfully Returned');

    }

    public function lenderlog(Request $request){
        $logs = DB::table('lendbook')->select('*')->get();
        //return $logs;
        return view('log')->with('logs',$logs);
    }
}
