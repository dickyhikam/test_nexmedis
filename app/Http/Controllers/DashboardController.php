<?php

namespace App\Http\Controllers;

use App\Models\CommentModel;
use App\Models\LikeModel;
use App\Models\PostModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index()
    {
        $data['title'] = "Social Media";
        // $data['year'] = now()->year;
        $data['first_name'] = Session::get('user_first');
        $data['last_name'] = Session::get('user_last');
        $data['user_id'] = Session::get('user_id');

        // Mengambil semua postingan dari database
        $list_post = PostModel::with(['comments', 'likes', 'user'])->orderBy('created_at', 'desc')->get();

        // Loop melalui setiap postingan untuk menghitung jumlah like dan status like pengguna saat ini
        foreach ($list_post as $post) {
            $post->like_count = $post->likes->count(); // Hitung jumlah like
            $post->liked_by_current_user = $post->likes->contains('user_id', Session::get('user_id')); // Cek jika pengguna saat ini sudah like
        }
        $data['list_post'] = $list_post;
        $data['list_post2'] = $list_post->where('user_id', Session::get('user_id'));

        $data['list_like'] = LikeModel::where('user_id', Session::get('user_id'))->get();
        $data['list_comment'] = CommentModel::where('user_id', Session::get('user_id'))->get();

        return view('dashboard/index', $data);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'description' => 'required|string|max:255',
        ]);

        // Proses unggah foto
        $path = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/post/'), $filename); // Simpan di public/assets/photos
            $path = 'assets/images/post/' . $filename; // URL relatif untuk disimpan di database
        }

        // Simpan data ke database
        PostModel::create([
            'user_id' => Session::get('user_id'), // Menggunakan ID pengguna saat ini
            'content' => $request->input('description'),
            'image_url' => $path,
        ]);

        // Redirect dan notifikasi
        return redirect()->route('social_media')->with([
            'message' => 'Post successfully created.',
            'alert-type' => 'success' // Tipe notifikasi: info, warning, success, error
        ]);
    }

    public function store_comment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // data save to database
        $user = new CommentModel();
        $user->post_id = $request->input('post_id');
        $user->user_id = Session::get('user_id');
        $user->comment = $request->input('comment');
        // Menyimpan data ke database dan memeriksa hasilnya
        if ($user->save()) {
            return redirect()->back()->with([
                'message' => 'Comment successfully created.',
                'alert-type' => 'success' // Tipe notifikasi: info, warning, success, error
            ]);
        } else {
            return redirect()->back()->with([
                'message' => 'Failed to create comment.',
                'alert-type' => 'error' // Tipe notifikasi: info, warning, success, error
            ])->withInput();
        }
    }

    public function store_like(Request $request)
    {
        // data save to database
        $user = new LikeModel();
        $user->post_id = $request->input('post_id');
        $user->user_id = Session::get('user_id');
        // Menyimpan data ke database dan memeriksa hasilnya
        if ($user->save()) {
            return redirect()->back()->with([
                'message' => 'Like successfully created.',
                'alert-type' => 'success' // Tipe notifikasi: info, warning, success, error
            ]);
        } else {
            return redirect()->back()->with([
                'message' => 'Failed to create like.',
                'alert-type' => 'error' // Tipe notifikasi: info, warning, success, error
            ])->withInput();
        }
    }
    public function store_unlike(Request $request)
    {
        // Mencari like yang ada untuk post_id dan user_id tertentu
        $like = LikeModel::where('post_id', $request->input('post_id'))
            ->where('user_id', Session::get('user_id'))
            ->first();

        if ($like) {
            $like->delete();
            return redirect()->back()->with([
                'message' => 'Successfully unlike.',
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->back()->with([
                'message' => 'Failed to unlike.',
                'alert-type' => 'error'
            ]);
        }
    }
}
