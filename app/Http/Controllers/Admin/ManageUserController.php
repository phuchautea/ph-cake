<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\UserService;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
        $users = $this->userService->getAllPaginate();
        return view('admin.users.list', [
            'title' => 'Danh sách người dùng',
            'users' => $users,
            'total_records' => $users->total(),
        ])->with('userService', $this->userService);
    }
    public function destroy(Request $request)
    {
        $result = $this->userService->remove($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa người dùng thành công'
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => 'Có lỗi xảy ra khi xóa người dùng'
        ]);
    }
}
