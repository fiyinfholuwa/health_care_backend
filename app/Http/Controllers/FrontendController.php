<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\PostCategory;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home(){
        $blogs = Blog::paginate(3);
        $testimonials = Testimonial::paginate(2);
        return view('frontend.home', compact('blogs', 'testimonials'));
    }
    public function about(){
        return view('frontend.about');
    }
    public function services(){
        return view('frontend.services');
    }
    public function insights(){
        $latest_blog = Blog::latest()->paginate(3);
        $spot_light = Blog::paginate(6);
        $categories = PostCategory::all();
        return view('frontend.insights', compact('latest_blog', 'spot_light', 'categories'));
    }
    public function insights_detail($slug){
        $blog = Blog::where('slug', '=', $slug)->first();
        return view('frontend.insights_detail', compact('blog'));
    }

    public function testimonials(){
        $testimonials = Testimonial::latest()->get();
        return view('frontend.testimonials', compact('testimonials'));
    }
    public function resources(){
        return view('frontend.resources');
    }
    public function contact(){
        return view('frontend.contact');
    }
    public function booking(){
        return view('frontend.booking');
    }
    public function pca(){
        return view('frontend.pca');
    }
    public function nurse(){
        return view('frontend.nurse');
    }
    public function nursing(){
        return view('frontend.nursing');
    }
    public function pediatrics(){
        return view('frontend.pediatrics');
    }
    public function live_care(){
        return view('frontend.live_care');
    }

    public function therapy(){
        return view('frontend.therapy');
    }
    public function terms(){
        return view('frontend.terms');
    }
    public function policy(){
        return view('frontend.policy');
    }

    public function booking_save(Request $request)
    {
        $validatedData = $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'phone'       => 'required|string|max:20',
            'dateTime'    => 'required|date',
            'description' => 'required|string|max:1000',
        ]);

        // Create a new booking record
        $booking = new Booking();
        $booking->name = $validatedData['name'];
        $booking->email = $validatedData['email'];
        $booking->phone = $validatedData['phone'];
        $booking->time = $validatedData['dateTime'];
        $booking->message = $validatedData['description'];
        $booking->save();

        $notification = array(
            'message' => 'Your consultation has been booked successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function contact_save(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|string|max:20',
            'message' => 'required|string|max:1000',
        ]);

        // Create a new contact record
        $contact = new Contact();
        $contact->name = $validatedData['name'];
        $contact->email = $validatedData['email'];
        $contact->phone = $validatedData['phone'];
        $contact->message = $validatedData['message'];
        $contact->save();

        // Notification message for success
        $notification = [
            'message' => 'Your message has been sent successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function insight_search(Request $request)
    {

        $searchQuery = $request->input('query');
        $categoryId = $request->input('category');


        $blogs = Blog::where('title', 'like', '%' . $searchQuery . '%')
            ->where('category_id', 'like', '%' . $categoryId . '%')->get();
        $categories = PostCategory::all();

        return view('frontend.insights_search', compact('blogs', 'categories', 'searchQuery'));
    }
}
