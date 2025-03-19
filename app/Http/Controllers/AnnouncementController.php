<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop\Models\Announcement;

class AnnouncementController extends Controller
{
    public function AnnouncementManagePage()
    {
        $announcements = Announcement::orderBy('created_at', 'desc')->get();

        $blinding = [
            'title' => '公告管理 - ',
            'page_title' => '公告管理',
            'announcements' => $announcements,
        ];

        return view('announcement.manage', $blinding);
    }

    public function AnnouncementCreateProcess()
    {
        $default_data = [
            'title' => '新公告',
            'content' => '',
            'start_date' => date('Y-m-d'),
            'end_date' => date('Y-m-d', strtotime('+1 month')),
        ];
        $announcement = Announcement::create($default_data);

        return redirect('/announcement/' . $announcement->id . '/edit');
    }

    public function AnnouncementEditPage($announcement_id)
    {
        $announcement = Announcement::findOrFail($announcement_id);

        $blinding = [
            'title' => '編輯公告 - ',
            'page_title' => '編輯公告',
            'announcement' => $announcement,
        ];

        return view('announcement.edit', $blinding);
    }

    public function AnnouncementEditProcess($announcement_id)
    {
        $input = request()->all();
        $announcement = Announcement::where('id', $announcement_id)->first();
        $announcement->update($input);

        return redirect('/announcement/' . $announcement->id . '/edit')->with('success', '公告更新成功');
    }
}
