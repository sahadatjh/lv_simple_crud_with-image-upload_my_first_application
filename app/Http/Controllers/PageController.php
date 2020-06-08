<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class PageController extends Controller
{
	public function index(){
		$post=DB::table('posts')->join('catagories','posts.catagori_id','catagories.id')
		->select('posts.*','catagories.name','catagories.slug')->paginate(3);
		return view('pages.index',compact('post'));
	}
   
    public function AboutPage(){
    	return view('pages.about');
    }
    public function ContuctPage(){
    	return view('pages.contuct');
    }
    public function writePost(){
    	$catagory=DB::table('catagories')->get();
    	return view('posts.writepost',compact('catagory'));
    }
     public function addcatagory(){
    	return view('posts.addcatagory');

    }


	public function storecatagory(Request $request){
		$request->validate([
	        'name' => 'required|unique:catagories|max:25|min:4',
	        'slug' => 'required|unique:catagories|max:25|min:4',
    	]);

		$data=array();
		$data['name']=$request['name'];
		$data['slug']=$request['slug'];
		$catagory=DB::table('catagories')->insert($data);
		//return response()->json($data);
		//echo '<pre>';
		//print_r($data);
		if($catagory){
			$notification=array(
				'messege'=>'Catagory inserted successfully!',
				'alert-type'=>'success'
			);
			return redirect()->route('all.catagory')->with($notification);
		}else{
			$notification=array(
				'messege'=>'Something wents wrong!!!',
				'alert-type'=>'error'
			);
			return redirect()->back()->with($notification);
		}
	}

	public function allcatagory(){
		$catagory=DB::table('catagories')->get();
		//return response()->json($catagory);
		return view('posts.all_catagory',compact('catagory'));
	}

	public function viewcatagory($id){
		$catagory=DB::table('catagories')->where('id',$id)->first();
		// return response()->json($catagory);
		return view('posts.view_catagory')->with('cat',$catagory);
	}
	public function deletecatagory($id){
		$delete=DB::table('catagories')->where('id',$id)->delete();
		if($delete){
			$notification=array(
				'messege'=>'Catagory deleted successfully!',
				'alert-type'=>'success'
			);
			return redirect()->back()->with($notification);
		}
	}
	public function EditCatagory($id){
		$catagory=DB::table('catagories')->where('id',$id)->first();
		return view('posts.edit_catagory',compact('catagory'));
	}

	public function UpdateCatagory(Request $request, $id){
		$request->validate([
	        'name' => 'required|max:25|min:4',
	        'slug' => 'required|max:25|min:4',
    	]);

		$data=array();
		$data['name']=$request['name'];
		$data['slug']=$request['slug'];
		$catagory=DB::table('catagories')->where('id',$id)->update($data);
		if($catagory){
			$notification=array(
				'messege'=>'Catagory updated successfully!',
				'alert-type'=>'success'
			);
			return redirect()->route('all.catagory')->with($notification);
		}else{
			$notification=array(
				'messege'=>'Nothing to update!!!',
				'alert-type'=>'error'
			);
			return redirect()->route('all.catagory')->with($notification);
		}
	}

	
}
