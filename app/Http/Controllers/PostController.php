<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function StorePost(Request $request){
    	$request->validate([
	        'title' => 'required|max:200|min:5',
	        'details' => 'required|max:500',
	        'post_photo' => 'mimes:jpeg,jpg,png,gif|max:1000',
    	]);
    	$data=array();
    	$data['catagori_id']=$request->catagory;
    	$data['title']=$request->title;
    	$data['detail']=$request->details;
    	$image=$request->file('image');
    	if ($image) {
    		$image_name=hexdec(uniqid());
    		$ext=strtolower($image->getClientOriginalExtension());
           // echo $ext;
    		$image_full_name=$image_name.'.'.$ext;
    		$upload_path='public/frontend/images/';
    		$image_url=$upload_path.$image_full_name;
    		$success=$image->move($upload_path,$image_full_name);
			$data['image']=$image_url;
			
    		DB::table('posts')->insert($data);
    		$notification=array(
				'messege'=>'Post Created successfully!',
				'alert-type'=>'success'
			);
    		return  Redirect()->back()->with($notification);
    	} else {
    		DB::table('posts')->insert($data);
    		$notification=array(
				'messege'=>'Post Created successfully!',
				'alert-type'=>'success'
			);
			return  Redirect()->back()->with($notification);
			
    	}
    }

    public function AllPosts(){
        $posts=DB::table('posts')
            ->join('catagories','posts.catagori_id','catagories.id')
            ->select('posts.*','catagories.name')
            ->get();
        return view('posts.all_posts',compact('posts'));
    }

    public function ViewPost($id){
        $post=DB::table('posts')
        ->join('catagories','posts.catagori_id','catagories.id')
        ->select('posts.*','catagories.name')
        ->where('posts.id',$id)->first();
        // return response()->json($post);
        return view('posts.view_post',compact('post',$post));
    }


    public function DeletePost($id){
		$post=DB::table('posts')->where('id',$id)->first();
		$image=$post->image;
		// return response()->json($post);
        $delete=DB::table('posts')->where('id',$id)->delete();
        if ($delete) {
        	if($image){unlink($image);}
			
           $notification=array(
                'messege'=>'Post deleted successfully!',
                'alert-type'=>'success'
            );
        } 
        return  Redirect()->back()->with($notification);
	}
	
	public function EditPost($id){
        $post=DB::table('posts')->where('id',$id)->first();
        $catagory=DB::table('catagories')->get();
		return view('posts.edit_psot',compact('catagory','post'));
	}
	public function UpdatePost(Request $request,$id){
		$validatedData = $request->validate([
			'title' => 'required|max:200',
			'details' => 'required',
			'image' => ' mimes:jpeg,jpg,png,PNG | max:1000',
		]);

	   $data=array();
	   $data['title']=$request->title;
	   $data['catagori_id']=$request->catagory;
	   $data['detail']=$request->details;
	   $image=$request->file('image');
	   
	   if ($image) {
		   $image_name=hexdec(uniqid());
		   $ext=strtolower($image->getClientOriginalExtension());
		   $image_full_name=$image_name.'.'.$ext;
		   $upload_path='public/frontend/images/';
		   $image_url=$upload_path.$image_full_name;
		   $success=$image->move($upload_path,$image_full_name);
		   $data['image']=$image_url;
		   if($request->oldphoto){
		   	unlink($request->oldphoto);
		   }
		   DB::table('posts')->where('id',$id)->update($data);
			$notification=array(
			   'messege'=>'Successfully Post Updated',
			   'alert-type'=>'success'
				);
			return Redirect()->route('all.post')->with($notification);
	   }else{
			$data['image']=$request->oldphoto;
			DB::table('posts')->where('id',$id)->update($data);
			$notification=array(
			   'messege'=>'Successfully Post Updated',
			   'alert-type'=>'success'
				);
			return Redirect()->route('all.post')->with($notification);
	   }
	}
	
}
