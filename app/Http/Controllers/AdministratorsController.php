<?php

namespace App\Http\Controllers;

use \App\Models\Administrator;

use App\Models\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\AdminSaveRequest;

use App\Http\Requests;

class AdministratorsController extends Controller
{
    public function index()
    {
        //if admin is sales
        if (\Auth::user()->role == 3) {
            return redirect('/home');
        }
        //is admin is manager, show all admins but owner
        if (\Auth::user()->role == 2) {
            $administrators = User::where('role', '!=', 1)->get();
        } else {
            //owner sees all admins
            $administrators = User::get();
        }

        $countAdministrators = count($administrators);

        return view('administrators.index', [
            'count' => $countAdministrators,
            'administrators' => $administrators]);
    }

    public function store(AdminSaveRequest $request)
    {

        // automatically checks the validations. redirects back to the same page if didnt pass
        if ($request->file('image')) {
            //check if your form sent some data
            // list of extensions allowed to be uploaded
            $allowedext = array("png", "jpg", "jpeg", "gif");
            //store the file received from the form in a var
            $photo = $request->file('image');
            //set destination path where you will store your photo
            $destinationPath = public_path() . '/uploads';
            //generate random filename
            $filename = str_random(12);
            //get the extension of the file uploaded by the user
            $extension = $photo->getClientOriginalExtension();
            //validate if file's extension matches allowed extension
            if (in_array($extension, $allowedext)) {
                //if every thing goes fine move the file
                $request->file('image')->move($destinationPath, $filename . '.' . $extension);
            }

        }

        $admin = new User;

        $admin->fill(array_except($request->all(), ['_token', 'image','password']));
        if (isset($filename)) {
            $admin->image = $filename . '.' . $extension;
        }
        if (isset($request->password)) {
            $admin->password = bcrypt($request->password);
        }
        if (isset($request->role)) {
            $admin->role = (int) $request->role;
        }
        if (isset($request->phone)) {
            $admin->phone = $request->phone;
        }

        $admin->save();

        return redirect()->back();
    }

    //show info of any selected admin
    public function show($id)
    {
        $admin = User::with('roles')->find($id);
        $roles = Role::get();

        //find the id in the admin table
        $administrator= Administrator::find($id);

        //this will get the role
        $roleId = $administrator->role;

        //find the specific role for this admin in the role table
        $role = Role::where('id',$roleId)->first();

        //the name of the admin's role from the role table
        $roleName = $role->name;


        return view('administrators.admin-details', compact('admin', 'roles', 'roleName'));

    }

    public function showEdit($id)
    {
        $admin = User::with('roles')->find($id);
        $roles = Role::get();

        return view('administrators.edit-admin', compact('admin', 'roles'));
    }

    //save data of new admin (if edited)
    public function updateAdmin(Request $request)
    {
        if ($request->file('image')) {
            //check if your form sent some data
            // list of extensions allowed to be uploaded
            $allowedext = array("png", "jpg", "jpeg", "gif");
            //store the file received from the form in a var
            $photo = $request->file('image');
            //set destination path where you will store your photo
            $destinationPath = public_path() . '/uploads';
            //generate random filename
            $filename = str_random(12);
            //get the extension of the file uploaded by the user
            $extension = $photo->getClientOriginalExtension();
            //validate if the user supplied file's extension matches allowed extension
            if (in_array($extension, $allowedext)) {
                //if everything goes fine move the file
                $request->file('image')->move($destinationPath, $filename . '.' . $extension);
            }

        }

        $currentAdmin = Administrator::find($request->input('id')); //find current admin
        $currentAdmin->fill(array_except($request->all(), ['_token', 'image', 'admin_id','password'])); //not saving these two fields in the array (implicitly)
        if (isset($filename)) {
            $currentAdmin->image = $filename . '.' . $extension;
        }
        //need to do this check because the pw is the only field not loaded into the edit form-without this, it will be deleted from db if not updated
        if (!empty($request->password)) {
            $currentAdmin->password = bcrypt($request->password);
        }

        $currentAdmin->save();

        return redirect()->back();
    }


    public function delete($id)
    {
        try {
            $admin = User::find($id);

            if ($admin) {
                $admin->delete();
            }
            $count = Administrator::count();
            //return json encoded array
            return json_encode(['status' => 'success', 'id' => $id, 'remaining' => $count]);
        } catch (\Exception $e) {
            return json_encode(['status' => 'error']);
        }
    }


}
