<?php


namespace App\Http\Controllers\Tag;


use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class TagController
{
    public function list()
    {
        $tags = Tag::paginate(15);
        $page = 'tags';

        return view('tag.table', compact('tags', 'page'));
    }

    public function create()
    {
        return view('tag.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'min:5', 'unique:tags,title'],
            'slug'  => ['required', 'min:5', 'unique:tags,slug'],
        ]);

        $tag = Tag::create($data);

        $_SESSION['message'] = [
            'status' => 'success',
            'text'   => "Tag \"{$tag->title}\" successfully saved"
        ];

        return redirect()->route('tags');
    }

    public function edit(Tag $tag)
    {
        return view('tag.form', compact('tag'));
    }

    public function update(Tag $tag, Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'min:5', 'unique:tags,title,' . $tag->id],
            'slug'  => ['required', 'min:5', 'unique:tags,slug,' . $tag->id],
        ]);

        $tag->update($data);

        $_SESSION['message'] = [
            'status' => 'success',
            'text'   => "Tag \"{$tag->title}\" successfully saved"
        ];

        return redirect()->route('tags');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        $_SESSION['message'] = [
            'status' => 'success',
            'text'   => "Tag \"{$tag->title}\" successfully deleted"
        ];

        return redirect()->route('tags');
    }
}
