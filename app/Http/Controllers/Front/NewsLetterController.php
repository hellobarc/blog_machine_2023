<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\NewsLetter;
use App\Models\Comment;
use App\Models\LikeArticle;
use App\Models\ContactUser;
use Auth;
class NewsLetterController extends Controller
{
    public function subcribtion(Request $request)
    {
        
            $validation = Validator::make($request->all(),[
                'email' => 'required|email|unique:users'
            ]
            );
            if( $validation->fails())
            {
                return response()->json(['error'=>$validation->errors()->all()]);
            }
            $user = NewsLetter::create([
                'newsletter_user_email'=>$request->email
                ]);
                
                return response()->json([
                      'message' => 'Add created Successfuly',
                      'user' => $user
                    ],200);
    }
    public function commentSubmission(Request $request)
    {       //dd($request->all());
            $validation = Validator::make($request->all(),[
                'comment' => 'required|string',
                'article_id' => 'required|integer'
            ]
            );
            if( $validation->fails())
            {
                return response()->json(['error'=>$validation->errors()->all()]);
            }
            $data = $request->all();
            $user = Comment::create([
                'article_id'=>$data['article_id'],
                'user_id'=>Auth::guard('customLogin')->user()->id,
                'comment'=>$data['comment'],
                'status'=>'pending',
                'type'=>'first',
                ]);
                //dd($user);
                return response()->json([
                      'message' => 'Add created Successfuly',
                    //   'user' => $user
                    ],200);
    }
    public function commentReply(Request $request)
    {       //dd($request->all());
            $validation = Validator::make($request->all(),[
                'comment' => 'required|string',
                'article_id' => 'required|integer',
                'comment_id' => 'required|integer'
            ]
            );
            if( $validation->fails())
            {
                return response()->json(['error'=>$validation->errors()->all()]);
            }
            $data = $request->all();
            $user = Comment::create([
                'article_id'=>$data['article_id'],
                'user_id'=>Auth::guard('customLogin')->user()->id,
                'comment'=>$data['comment'],
                'status'=>'pending',
                'type'=>'reply',
                'reply_comment_id'=>$data['comment_id'],
                ]);
                //dd($user);
                return response()->json([
                      'message' => 'Add created Successfuly',
                      'user' => $user
                    ],200);
    }
    public function save_likedislike(Request $request){
        //dd($request->all());
        // $data=new LikeArticle;
        // $data->article_id=$request->post;
        // if($request->type=='like'){
        //     $data->like=1;
        // }else{
        //     $data->dislike=1;
        // }
        // $data->save();
        LikeArticle::updateOrCreate([
            'article_id'=>$request->post,
        ],
        [
            'likes'=>$request->count,
        ]
        );
        return response()->json([
            'bool'=>true
        ]);
    }
    public function contactWithUs(Request $request)
    {
        $request->validate([
            'contact_name'      => 'required|string',
            'contact_email'     => 'required|email',
            'contact_number'    => 'nullable|string',
            'contact_address'   => 'nullable|string',
            'message'           => 'required|string',
        ],
        [
            'contact_name.required' => 'Please Provide your Name',
   		    'contact_email.required' => 'please provide valid email address',
   		    'message.required' => 'write your own message here',
        ]);
        ContactUser::create([
            'name'=>            $request->contact_name,
            'email' =>          $request->contact_email,
            'contact_number'=>  $request->contact_number,
            'address'=>         $request->contact_address,
            'message'=>         $request->message,
        ]);
        return redirect()->back()->with('success', 'Your information updated successfully! We are contact with you');
    }
    
    
        
}
