<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatUserRequest;
use App\Http\Services\UserService;
use App\Http\Services\GroupService;
use App\Http\Services\RoleService;
use App\Models\Group;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected  $userService;
    protected $groupService;
    protected $roleService;

    public function __construct(UserService $userService, GroupService $groupService,RoleService $roleService )
    {
        $this->userService = $userService;
        $this->groupService = $groupService;
        $this->roleService = $roleService;
    }

    function index()
    {
        $users = $this->userService->getAll();
        return view('admin.users.list', compact('users'));
    }

    function create() {
//        $groups = $this->groupService->getAll();
        $groups = Group::all();
        $roles = Role::all();
        return view('admin.users.add', compact('groups', 'roles'));
    }

    function store(Request $request) {
        $this->userService->store($request);
        return redirect()->route('users.index');
    }

    function edit($id) {
        $groups = Group::all();
        $roles =  Role::all();
        $user = $this->userService->getById($id);
        return view('admin.users.edit', compact('groups','user','roles'));
    }

    function update($id, Request $request)
    {
        $this->userService->update($id, $request);
        return redirect()->route('users.index');
    }

    function delete($id) {

        $this->userService->delete($id);
        return redirect()->route('users.index');

    }
}
