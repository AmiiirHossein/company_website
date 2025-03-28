<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Counter;
use App\Models\Faq;
use App\Models\FooterAbout;
use App\Models\FooterContact;
use App\Models\FooterQuick;
use App\Models\FooterService;
use App\Models\Header;
use App\Models\Hero;
use App\Models\Intro;
use App\Models\Project;
use App\Models\Seo;
use App\Models\Service;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\TopHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $seo = Seo::orderBy('id','desc')->take(1)->first();
        $topheader = TopHeader::orderBy('id', 'desc')->take(1)->first();
        $header = Header::orderBy('id','asc')->take(6)->get();
        $hero = Hero::orderBy('id', 'desc')->take(1)->first();
        $about = About::orderBy('id','desc')->take(1)->first();
        $intro = Intro::orderBy('id', 'desc')->take(1)->first();
        $service = Service::orderBy('id', 'desc')->take(1)->first();
        $counter = Counter::orderBy('id', 'desc')->take(4)->get();
        $team = Team::orderBy('id', 'desc')->take(4)->get();
        $project = Project::orderBy('id', 'asc')->take(6)->get();
        $testimonial = Testimonial::orderBy('id','desc')->take(3)->get();
        $blog = Blog::with('user','category')->orderBy('id','desc')->take(3)->get();
        $faq = Faq::orderBy('id', 'desc')->take(1)->first();
        $footerAbout = FooterAbout::orderBy('id', 'desc')->take(1)->first();
        $footerService = FooterService::orderBy('id', 'desc')->take(3)->get();
        $footerQuick = FooterQuick::orderBy('id', 'desc')->take(5)->get();
        $footerContact = FooterContact::orderBy('id', 'desc')->take(1)->first();
        return view('front.index', compact('seo', 'topheader','header' ,'hero', 'about', 'intro', 'service', 'counter', 'team', 'project', 'testimonial', 'blog', 'faq', 'footerAbout', 'footerService', 'footerQuick', 'footerContact'));
    }

    public function contact(Request $request){
        Contact::create([
           'fullname'=>$request->fullName,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'description'=>$request->description,
        ]);
        return 1;
    }

    public function comment(Request $request){
       Comment::create([
           'description'=>$request->description,
           'user_id'=>Auth::user()->id,
           'blog_id'=>$request->blog_id,
           'parent_id'=>$request->parent_id,
       ]);

       return 1;
    }

    public function blog(){
        $blog = Blog::paginate(4);
        $project = Project::orderBy('id', 'desc')->take(3)->get();
        $topheader = TopHeader::orderBy('id', 'desc')->take(1)->first();
        $header = Header::orderBy('id','asc')->take(6)->get();
        $footerAbout = FooterAbout::orderBy('id', 'desc')->take(1)->first();
        $footerService = FooterService::orderBy('id', 'desc')->take(3)->get();
        $footerQuick = FooterQuick::orderBy('id', 'desc')->take(5)->get();
        $footerContact = FooterContact::orderBy('id', 'desc')->take(1)->first();
        $category = Category::all();
        return view('front.blog', compact('blog','project','topheader','header','footerAbout','footerService','footerContact','footerQuick','category'));
    }

    public function blogDetail($id){
        $blogDetail= Blog::with('user', 'category')->findOrFail($id);
        $project = Project::orderBy('id', 'desc')->take(3)->get();
        $topheader = TopHeader::orderBy('id', 'desc')->take(1)->first();
        $header = Header::orderBy('id','asc')->take(6)->get();
        $footerAbout = FooterAbout::orderBy('id', 'desc')->take(1)->first();
        $footerService = FooterService::orderBy('id', 'desc')->take(3)->get();
        $footerQuick = FooterQuick::orderBy('id', 'desc')->take(5)->get();
        $footerContact = FooterContact::orderBy('id', 'desc')->take(1)->first();
//        $comment = Comment::with('user')->where('blog_id', $id)->where('status', 1)->where('parent_id', null)->get();
//        $commentReplay = Comment::with('childs')->where('blog_id', $id)->where('status', 1)->where('parent_id',2)->get();
        // $comment = Comment::with('childs')->where('blog_id', $id)->where('status', 1)->whereNull('parent_id')->get();
        $comment = Comment::with(['childs' => function ($query) { $query->where('status', 1);}])->where('blog_id', $id)->where('status', 1)->whereNull('parent_id')->get();
        return view('front.blog-detail', compact('blogDetail','project','header','topheader','footerQuick','footerContact','footerService','footerAbout', 'comment'));
    }

    public function search($id){
        $category = Category::all();
        $search = Blog::where("category_id", 'like', '%'.$id.'%' )->get();
        $project = Project::orderBy('id', 'desc')->take(3)->get();

        $topheader = TopHeader::orderBy('id', 'desc')->take(1)->first();
        $header = Header::orderBy('id','asc')->take(6)->get();
        $footerAbout = FooterAbout::orderBy('id', 'desc')->take(1)->first();
        $footerService = FooterService::orderBy('id', 'desc')->take(3)->get();
        $footerQuick = FooterQuick::orderBy('id', 'desc')->take(5)->get();
        $footerContact = FooterContact::orderBy('id', 'desc')->take(1)->first();
        return view('front.search', compact('search','category','project','header','topheader','footerQuick','footerContact','footerService','footerAbout'));
    }

}
