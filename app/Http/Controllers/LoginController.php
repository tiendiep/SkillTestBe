<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __construct()
    {
        // Bỏ các middleware mà không cần thiết
        $this->middleware('guest')->except(['dashboard', 'logout']);
    }

    /**
     * Hiển thị form đăng nhập.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Xử lý đăng nhập người dùng.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Kiểm tra dữ liệu nhập vào
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Tìm người dùng theo email
        $user = User::where('email', $request->input('email'))->first();

        // Kiểm tra mật khẩu
        if ($user && Hash::check($request->input('password'), $user->password)) {
            // Đăng nhập thành công, lưu thông tin người dùng vào session
            session(['user' => $user]);

            // Chuyển hướng đến trang dashboard
            return redirect()->route('dashboard');
        }

        // Nếu không thành công, quay lại với thông báo lỗi
        return back()->withErrors(['error' => 'Email hoặc mật khẩu không đúng.']);
    }

    /**
     * Hiển thị trang Dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!session('user')) {
            // Nếu chưa đăng nhập, chuyển hướng đến trang login
            return redirect()->route('login');
        }

        // Nếu đã đăng nhập, hiển thị trang dashboard
        return view('dashboard', ['user' => session('user')]);
    }

    /**
     * Đăng xuất người dùng.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        // Xóa session người dùng
        session()->forget('user');

        // Chuyển hướng về trang đăng nhập
        return redirect()->route('login');
    }
}
