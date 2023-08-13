<?php

namespace OpenDeveloper\Developer\Scheduling;

use Illuminate\Http\Request;
use OpenDeveloper\Developer\Facades\Developer;
use OpenDeveloper\Developer\Layout\Content;

class SchedulingController
{
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Developer::content(function (Content $content) {
            $content->header('Task scheduling');

            $scheduling = new Scheduling();

            $content->body(view('open-developer-scheduling::index', [
                'events' => $scheduling->getTasks(),
            ]));
        });
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    public function runEvent(Request $request)
    {
        $scheduling = new Scheduling();

        try {
            $output = $scheduling->runTask($request->get('id'));

            return [
                'status'    => true,
                'message'   => 'success',
                'data'      => $output,
            ];
        } catch (\Exception $e) {
            return [
                'status'    => false,
                'message'   => 'failed',
                'data'      => $e->getMessage(),
            ];
        }
    }
}
