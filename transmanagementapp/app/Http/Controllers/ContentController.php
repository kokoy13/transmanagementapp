<?php
namespace App\Http\Controllers;

use App\Http\Requests\ContentRequest;
use App\Models\Content;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::all();
        return view('pages.content.index')->with(compact('contents'));
    }

    public function create()
    {
        $content = Content::all()->count();
        if ($content == 5) {
            return redirect()->route('contents')->with('error', 'Jumlah content telah mencapai limit');
        }
        return view('pages.content.create-content');
    }

    public function store(ContentRequest $request)
    {
        $content = $request->validated();
        $store = $request->file('thumbnail')->store('public');
        $create = Content::create([
            'title' => $content['title'],
            'excerpt' => $content['excerpt'],
            'content' => $content['content'],
            'thumbnail' => basename($store),
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('contents')->with('success', 'Berhasil menambahkan content');

    }

    public function edit($id)
    {
        $content = Content::find($id);
        return view('pages.content.edit-content')->with(compact('content'));
    }

    public function update(ContentRequest $request, $id)
    {
        $content = Content::findOrFail($id);
        $content->title = $request->input('title');
        $content->excerpt = $request->input('excerpt');
        $content->content = $request->input('content');

        if ($request->hasFile('thumbnail')) {
            if ($content->thumbnail && Storage::disk('public')->exists($content->thumbnail)) {
                Storage::disk('public')->delete($content->thumbnail);
            }
            $store = $request->file('thumbnail')->store('public');
            $content->thumbnail = basename($store);
        }
        $content->save();

        return redirect()->route('contents')->with('success', 'Content berhasil diperbarui.');
    }

    public function delete($id)
    {
        $count = Content::all()->count();
        if ($count == 3) {
            return redirect()->route('contents')->with('error', 'Tidak bisa menghapus. Content sudah pada jumlah minimum.');
        }
        $content = Content::find($id);
        $content->delete();
        Storage::disk('public')->delete($content->thumbnail);
        return redirect()->route('contents')->with('success', 'Berhasil menghapus content');
    }
}
