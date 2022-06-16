<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Requests\BlogRequest;

class BlogController extends Controller
{
    /**
     * ブログ一覧を表示する
     * 
     * @return view
     */
    public function showList()
    {
        $blogs = Blog::all();

        // dd($blogs);
        return view('blog.list', ['blogs' => $blogs]);
    }

    /**
     * ブログ詳細を表示する
     * @param int $id
     * @return view
     */
    public function showDetail($id)
    {
        $blog = Blog::find($id);

        if (is_null($blog)) {
            // session(['err_msg', 'データがありませええん']);
            \Session::flash('err_msg', 'データがありませええええええん');

            // web.phpでnameをつけたblogsにリダイレクト
            return redirect(route('blogs'));
        }

        return view('blog.detail', ['blog' => $blog]);
    }

    /**
     * ブログ登録画面を表示する
     * 
     * @return view
     */
    public function showCreate(){
        return view('blog.form');
    }

    /**
     * ブログ登録画面を登録する
     * 
     * @return view
     */
    public function exeStore(BlogRequest $request){
        $data = $request->all();

        \DB::beginTransaction();
        try {
            Blog::create($data);
            \DB::commit();                   
        } catch (\Throwable $e) {
            \DB::rollback();
            abort(500);
        }

        \Session::flash('err_msg', 'ブログを登録しましたあああい！');

        return redirect(route('blogs'));
    }

    /**
     * ブログ編集フォームを表示する
     * @param int $id
     * @return view
     */
    public function showEdit($id)
    {
        $blog = Blog::find($id);

        if (is_null($blog)) {
            // session(['err_msg', 'データがありませええん']);
            \Session::flash('err_msg', 'データがありませええええええん');

            // web.phpでnameをつけたblogsにリダイレクト
            return redirect(route('blogs'));
        }

        return view('blog.edit', ['blog' => $blog]);
    }

    /**
     * ブログ登録画面を更新する
     * 
     * @return view
     */
    public function exeUpdate(BlogRequest $request){
        $inputs = $request->all();

        // dd($inputs);

        \DB::beginTransaction();
        try {
            $blog = Blog::find($inputs['id']);
            $blog->fill([
                'title' => $inputs['title'],
                'content' => $inputs['content']
            ]);
            $blog->save();
            \DB::commit();                   
        } catch (\Throwable $e) {
            \DB::rollback();
            abort(500);
        }

        \Session::flash('err_msg', 'ブログを更新しましたあああい！');

        return redirect(route('blogs'));
    }

    /**
     * ブログ削除
     * @param int $id
     * @return view
     */
    public function exeDelete($id)
    {
        if (empty($id)) {
            // session(['err_msg', 'データがありませええん']);
            \Session::flash('err_msg', 'データがありませええええええん');

            // web.phpでnameをつけたblogsにリダイレクト
            return redirect(route('blogs'));
        }

        try {
            Blog::destroy($id);               
        } catch (\Throwable $e) {
            abort(500);
        }

        \Session::flash('err_msg', '削除したよおおおん');
        return redirect(route('blogs'));
    }

}