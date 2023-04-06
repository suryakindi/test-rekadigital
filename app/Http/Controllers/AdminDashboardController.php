<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Namecompany;
use App\Models\About;
use App\Models\Service;
use App\Models\Ourteam;
use App\Models\Contact;
use Auth;
class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titlecompany = Namecompany::where('part', 'title_company')->get();
        $data[] = $titlecompany;
        return view('admin.index', ['titlecompany'=>$data[0][0]]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function posttitlecompany(Request $request)
    {
       $data = Namecompany::where('part', 'title_company')->get();
       $titlecompany[] = $data;
       
       if($request->namecompany == null){
        $titlecompany[0][0]->namecompany = $request->oldnamecompany; 
       }else{
        $titlecompany[0][0]->namecompany = $request->namecompany;
       }

       if($request->tagline_1 == null){
        $titlecompany[0][0]->tagline_1 = $request->oldtagline_1;
       }else{
        $titlecompany[0][0]->tagline_1 = $request->tagline_1;
       }
       
       if($request->tagline_2 == null){
        $titlecompany[0][0]->tagline_2 = $request->oldtagline_2;
       }else{
        $titlecompany[0][0]->tagline_2 = $request->tagline_2;
       }

       if($request->banner == null){
        $titlecompany[0][0]->banner = $request->oldbanner;
       }else{
        $namabanner = $_FILES['banner']['name'];
        $ekstensi = array('jpg','img','jpeg');
        $ext = pathinfo($namabanner, PATHINFO_EXTENSION);
        if(!in_array($ext,$ekstensi)){
            echo "<script>
            alert('Ekstension Must Jpg,Img,Jpeg');
            window.location.href='/admin';
            </script>";
        }else{
            $namabarubanner = rand(0,1000).'-'.$namabanner;
            unlink('img/'.$request->oldbanner);
            move_uploaded_file($_FILES['banner']['tmp_name'], 'img/'.$namabarubanner);
            $titlecompany[0][0]->banner = $namabarubanner;
        }
        
       }
       $titlecompany[0][0]->save();
       $request->session()->flash('success');
       return redirect()->back();
    }
    public function about(){
        $data = About::where('part', 'about_company')->get();
        $about[] = $data;
        return view('admin.mainpanel.about', ['about'=>$about[0][0]]);
    }
    public function postabout(Request $request){
        $data = About::where('part', 'about_company')->get();
        $about[] = $data;
        if($request->heading == null){
            $about[0][0]->heading = $request->oldheading;
        }else{
            $about[0][0]->heading = $request->heading;
        }
        $about[0][0]->content = $request->content;
        $about[0][0]->save();
        $request->session()->flash('success');
        return redirect()->back();
    }
    public function service(){
        $service = Service::paginate(5);
        return view('admin.mainpanel.service', ['service'=>$service]);
    }
    public function postservice(Request $request){
        $service = new Service;
        $validate = $request->validate([
            'name_service' => 'required|max:255',
            'content_service' => 'required',
            'logo_service' => 'required|image',
        ]);
        if($validate){
        $service->name_service = $request->name_service;
        $service->content_service = $request->content_service;
        $namalogo = $_FILES['logo_service']['name'];
        $errorlogo = $_FILES['logo_service']['error'];
            if($errorlogo <= 0){
            $namabarulogo = rand(0,1000).'-'.$namalogo;
            move_uploaded_file($_FILES['logo_service']['tmp_name'], 'img/icon/'.$namabarulogo);
            $service->logo_service = $namabarulogo;
            }
        $service->save();
        $request->session()->flash('success');
        }
        
        return redirect()->back();
    }
    public function editservice($id){
        $service = Service::find($id);
        return view('admin.mainpanel.editservice', ['service'=>$service]);
    }
    public function posteditservice(Request $request, $id){
        $service = Service::find($id);
        
        $validate = $request->validate([
            'nameservice' => 'required|max:255',
            'contentservice' => 'required',
        ]);
        if($validate){
            $service->name_service = $request->nameservice;
            $service->content_service = $request->contentservice;
            if($request->logoservice == null){
                $service->logo_service = $request->oldlogoservice;
            }else{
                $namalogo = $_FILES['logoservice']['name'];
                $errorlogo = $_FILES['logoservice']['error'];
                if($errorlogo <= 0){
                    $namabarulogo = rand(0,1000).'-'.$namalogo;
                    unlink('img/icon/'.$request->oldlogoservice);
                    move_uploaded_file($_FILES['logoservice']['tmp_name'], 'img/icon/'.$namabarulogo);
                    $service->logo_service = $namabarulogo;
                }
            }
            $service->save();   
        }
        $request->session()->flash('success-editservice');
        return redirect()->back();
    }



    public function deleteservice(Request $request, $id){
        $service = Service::find($id);
        $logo_service = $service->logo_service;
        unlink('img/icon/'.$logo_service);
        $service->delete();
        $request->session()->flash('success-delete');
        return redirect('/admin/service');
    }

    public function ourteam(){
        $ourteam = Ourteam::paginate(5);
        return view('admin.mainpanel.ourteam', ['ourteam'=>$ourteam]);
    }

    public function postourteam(Request $request){
        $ourteam = new Ourteam;
        $validate = $request->validate([
            'name' => 'required|max:255',
            'potition' => 'required|max:255',
            'instagram' => 'required|max:255',
            'linkedin' => 'required|max:255',
            'images' => 'required|image',
        ]);
        if($validate){
            $ourteam->name = $request->name;
            $ourteam->potition = $request->potition;
            $ourteam->instagram = $request->instagram;
            $ourteam->linkedin = $request->linkedin;
            $namaimages = $_FILES['images']['name'];
            $errorimages = $_FILES['images']['error'];
                if($errorimages <= 0){
                $namabaruimages = rand(0,1000).'-'.$namaimages;
                move_uploaded_file($_FILES['images']['tmp_name'], 'img/'.$namabaruimages);
                $ourteam->images = $namabaruimages;
                }
            $ourteam->save();
        }
        $request->session()->flash('success-addnewteam');
        return redirect()->back();
    }
    

    public function deleteourteam(Request $request, $id){
        $ourteam = Ourteam::find($id);
        $images = $ourteam->images;
        unlink('img/'.$images);
        $ourteam->delete();
        $request->session()->flash('success-delete');
        return redirect('/admin/ourteam');
    }

    public function contact(){
        $data = Contact::where('part', 'contact_company')->get();
        $contact[] = $data;
        return view('admin.mainpanel.contact', ['contact'=>$contact[0][0]]);
    }
    public function postcontact(Request $request){
        $data = Contact::where('part', 'contact_company')->get();
        $contact[] = $data;
        $validate = $request->validate([
            'address'=> 'required|max:255',
            'address'=> 'required|max:255',
            'email'=> 'required|email|max:255',
        ]);
        if($validate){
            $contact[0][0]->address = $request->address;
            $contact[0][0]->phonenumber = $request->phonenumber;
            $contact[0][0]->email = $request->email;
            $contact[0][0]->save();
        }
        $request->session()->flash('success');
        return redirect()->back();
       
    }



    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}
