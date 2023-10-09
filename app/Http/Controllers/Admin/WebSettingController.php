<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\WebSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class WebSettingController extends Controller
{
    public function index(){
      $setting = WebSetting::first();
      $users = User::all();
      return view('backend.setting.index', compact('setting','users'));
    }

    public function updateSetting(Request $request){
      if($request->logo != NULL){
        $validatedData = $request->validate([
          'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
          'web_name' => 'required'
        ],
        [
          'web_name.required' => 'Nama Website harus diisi',
          'logo.mimes' => 'Logo harus berbentuk gambar(jpeg, png, gif, svg, webp)',
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

      User::query()->update([
        'approval_income' => 0,
        'approval_expenditure' => 0
      ]);

      foreach($request->income_approver as $income){
        User::where('id', base64_decode($income))->update(['approval_income' => 1]);
      }
      
      foreach($request->expenditure_approver as $expenditure){
        User::where('id', base64_decode($expenditure))->update(['approval_expenditure' => 1]);
      }
      
      return Response::json(['success' => 'Pengaturan Website berhasil diubah'],200);
    }

    public function getSelectedValue($params){
      $users_encrypt = [];
      if($params == 'income_approver'){
        foreach(User::where('approval_income',1)->get() as $user){
          array_push($users_encrypt, base64_encode($user->id));
        }
      }
      elseif($params == 'expenditure_approver'){
        foreach(User::where('approval_expenditure',1)->get() as $user){
          array_push($users_encrypt, base64_encode($user->id));
        }
      }
      return $users_encrypt;
    }
}
