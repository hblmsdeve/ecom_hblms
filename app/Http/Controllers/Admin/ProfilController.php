<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::id())->first();
        return view('admin.profil.show', compact('user'));
    }
    public function details($id)
    {
        $user = User::find($id);
        return view('admin.profil.details', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->lname = $request->input('lname');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address1 = $request->input('address1');
        $user->address2 = $request->input('address2');
        $user->city = $request->input('city');
        $user->country = $request->input('country');
        $user->zipcode = $request->input('zipcode');
        $user->update();
        return redirect('admin/profil/'.$id)->with('status', "Profil Updated Successfully");
    }

    public function admin()
    {
        $admins = User::where('role_as','<>', 0)->paginate(5);
        return view('admin.profil.index', compact('admins'));
    }

    public function add()
    {
        return view('admin.profil.add');
    }
    
    public function privelege(Request $request)
    {
        if (Auth::user()->role_as == '1') {
            $email = $request->input('email');
            $user = User::where('email', $email)->first();
            if ($user) {
                $user->role_as = $request->input('privilege');
                $user->update();
                return redirect('admin/settings')->with('status', $email." updated successfully");
            } else {
                return redirect('admin/settings')->with('status', $email." this not exist he need to register than make him Admin or Author");
            }
        } else {
            return redirect()->back()->with('status', "the link you followed was broken");
        }        
    }

    public function destroy($id)
    {
        if (Auth::user()->role_as == '1') {
            $user = User::find($id);
            $user->delete();
            return redirect('admin/settings')->with('status', $user->email. " Compte Deleted Successfully");
        } else {
            return redirect()->back()->with('status', "the link you followed was broken");
        } 
    }
}
