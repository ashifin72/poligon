<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Models\BlogPost;
use App\Repositories\BlogPostRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Repositories\BlogCategoryRepository;
use App\Http\Requests\BlogPostUpdateRequest;
use App\Http\Requests\BlogPostCreateRequest;


class PostController extends BaseController
{
    /**
     * @var BlogPostRepository
     *
     */
    private $blogPostRepository;
    /**
     * @var BlogCategoryRepository
     *
     */

    private $blogCategoryRepository;

    public function __construct()
    {
        parent::__construct();

        $this->blogPostRepository = app(BlogPostRepository::class);
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->blogPostRepository->getAllWithPaginate();
        return view('blog.admin.posts.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new BlogPost();
        $categoryList = $this->blogCategoryRepository->getForComboBox();
        return view('blog.admin.posts.create', compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogPostCreateRequest $request)
    {
        $data = $request->input();
        $item = (new BlogPost())->create($data);

        if ($item) {
            return redirect()->route('blog.admin.posts.create', $item->id)
                ->with(['success' => 'Успешное сохраненно!']);
        } else {
            return back()
                // если есть ошибка выдай и отправь назад на исходную точку с сохранением данных в инпуте
                ->withErrors(['msg' => 'Ошибка сохранения!',])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->blogPostRepository->getEdit($id);

        if (empty($item)) {
            abort(404);
        }
//       dd($item);
        $categoryList = $this->blogCategoryRepository->getForComboBox();
        return view('blog.admin.posts.edit',
            compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogPostUpdateRequest $request, $id)
    {
        $item = $this->blogPostRepository->getEdit($id);
        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись [{$id}] не найденна!"])
                ->withInput();
        }
        $data = $request->all();
        // перенсли в апсервер  проверку и создание слага и даты

        $result = $item->update($data);

        if ($result) {
            return redirect()->route('blog.admin.posts.edit', $item->id)
                ->with(['success' => 'Успешное сохраненно!']);
        } else {
            return back()
                // если есть ошибка выдай и отправь назад на исходную точку с сохранением данных в инпуте
                ->withErrors(['msg' => 'Ошибка сохранения!',])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = BlogPost::destroy($id);
        // Полное удаление
//        $result = BlogPost::find(id)->forceDelete();

        if($result){
            return redirect()
                ->route('blog.admin.posts.index')
                ->with(['success' => "запись $id удалена"]);
        }else{
            return back()->withErrors(['msg'=> 'Ошибка удаления']);
        }

    }
}
