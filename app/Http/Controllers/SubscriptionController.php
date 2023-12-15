<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function toggle(Blog $blog){
        //subscribed->unsubscribed->delete the data from database
        if($blog->isSubscribedBy(auth()->user())){
            $blog->subscribedUsers()->detach(auth()->id());
        }
        else{
            //not subscribed->subscribe->store the data
            $blog->subscribedUsers()->attach(auth()->id());
        }
        return back();
        
    }
}
