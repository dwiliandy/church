<?php

namespace App\Http\Controllers\Admin;

use App\Models\WebSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class WebSettingController extends Controller
{
    public function index(){
      $setting = WebSetting::first();
      return view('backend.setting.index', compact('setting'));
    }

    public function updateSetting(Request $request){
      if($request->logo != NULL){
        $validatedData = $request->validate([
          'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          'web_name' => 'required'
        ],
        [
          'web_name.required' => 'Nama Website harus diisi',
          'logo.mimes' => 'Logo harus berbentuk gambar(jpeg, png, gif, svg)',
          'logo.max' => 'Logo harus kurang dari 2MB',
          'logo.image' => 'File harus berbentuk gambar'
        ]);
        $validatedData['logo'] = $request->file('logo')->store('logo');
        Storage::delete(WebSetting::first()->logo);
        WebSetting::first()->update([
          'website_name' =>  $validatedData['web_name'],
          'logo' =>  $validatedData['logo']
        ]);
      }else{
        $validatedData = $request->validate([
          'web_name' => 'required'
        ],
        [
          'web_name.required' => 'Nama Website harus diisi'
        ]);
        WebSetting::first()->update([
          'website_name' =>  $validatedData['web_name']
        ]);
      }
      
      return Response::json(['success' => 'Pengaturan Website berhasil diubah'],200);
    }
}
