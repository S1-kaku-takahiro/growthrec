<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Album;
use App\Permission;
use App\User;

use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    public function add()
    {
        return view('album.create');
    }
    
    public function create(Request $request)
    {
        
        $validate_rule = [
            'child_name' => 'required|max:16',
            'birthday' => 'required|date',
            'associate_editor_email' => 'email',
            'viewer0_email' => 'email',
            'viewer1_email' => 'email',
            'viewer2_email' => 'email',
            'viewer3_email' => 'email',
        ];
        $this->validate($request, $validate_rule);
        
        $form = $request->all();

        $album = new Album;
        
        $album->child_name = $form['child_name'];
        $album->birthday = $form['birthday'];
        
        $album->save();

        // アルバム作成者のrole
        $permission = new Permission;
        $permission->album_id = $album->id;
        $permission->user_id = Auth::id();
        $permission->role = 1;
        $permission->save();
        
        // 共同編集者のrole
        if (isset($form['associate_editor_email'])) {
            $associate_editor = User::where('email', $form['associate_editor_email'])->first();
            if ($associate_editor) {
                $permission = new Permission;
                $permission->album_id = $album->id;
                $permission->user_id = $associate_editor->id;
                $permission->role = 1;
                $permission->save();
            }
        }
        
        
        if (isset($form['viewer0_email'])) {
            $viewer0 = User::where('email', $form['viewer0_email'])->first();
            if (isset($viewer0)) {
                $permission = new Permission;
                $permission->album_id = $album->id;
                $permission->user_id = $viewer0->id;
                $permission->role = 2;
                $permission->save();
            }
        }
        
        if (isset($form['viewer1_email'])) {
            $viewer1 = User::where('email', $form['viewer1_email'])->first();
            if (isset($viewer1)) {
                $permission = new Permission;
                $permission->album_id = $album->id;
                $permission->user_id = $viewer1->id;
                $permission->role = 2;
                $permission->save();
            }
        }
        
        if (isset($form['viewer2_email'])) {
            $viewer2 = User::where('email', $form['viewer2_email'])->first();
            if (isset($viewer2)) {
                $permission = new Permission;
                $permission->album_id = $album->id;
                $permission->user_id = $viewer2->id;
                $permission->role = 2;
                $permission->save();
            }
        }
        
        if (isset($form['viewer3_email'])) {
            $viewer3 = User::where('email', $form['viewer3_email'])->first();
            if (isset($viewer3)) {
                $permission = new Permission;
                $permission->album_id = $album->id;
                $permission->user_id = $viewer3->id;
                $permission->role = 2;
                $permission->save();
            }
        }
        
        // 入力したemailアドレスがなかった時
        
        // 長いからシンプルにしたい
        /*
        add_permission(Auth::user()->email, $album, 1);
        add_permission($form['associate_editor_email'], $album, 1);
        add_permission($form['viewer0_email'], $album, 2);
        add_permission($form['viewer1_email'], $album, 2);
        add_permission($form['viewer2_email'], $album, 2);
        add_permission($form['viewer3_email'], $album, 2);
        */
        
        
        return redirect('album/create');
    }
}

function add_permission($email, $album, $role){
    if (isset($email)) {
        $user = User::where('email', $email)->first();
        if(isset($user)) {
            $permission = new Permission;
            $permission->album_id = $album->id;
            $permission->user_id = $user->id;
            $permission->role = 2;
            $permission->save();
        }
    }
}
