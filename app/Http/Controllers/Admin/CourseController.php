<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\StoreCourse;
use App\Services\CourseService;
use App\Services\UploadFile;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\BitwiseOr;

use function PHPUnit\Framework\returnSelf;

class CourseController extends Controller
{
    protected $service;

    public function __construct(CourseService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $courses = $this->service->getAll(
            filter: $request->filter ?? ""
        );
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(StoreCourse $request, UploadFile $uploadFile)
    {
        $data = $request->only('name');
        $data['available'] = isset($request->available);

        if($request->image) {
          $data['image'] = $uploadFile->store($request->image, 'courses');
        }

        $this->service->create($data);

        return redirect()->route('courses.index');
    }

    public function edit($id)
    {
        if(!$course = $this->service->findById($id))
        return back();

        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, UploadFile $uploadFile, $id)
    {
        // REMOVE OLD IMAGE
        $data = $request->only('name');
        $data['available'] = isset($request->available);

        if($request->image) {
            $course = $this->service->findById($id);
            if($course && $course->image) {
            $uploadFile->removeFile($course->image);
        }

          //UPLOAD NEW IMAGE
          $data['image'] = $uploadFile->store($request->image, 'courses');
        }

        $this->service->update($id, $data);

        return redirect()->route('courses.index');
    }
}
