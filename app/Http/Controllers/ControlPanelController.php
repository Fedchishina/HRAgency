<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Comment;
use App\Contact;
use App\Person;
use App\PersonInfo;
use App\User;
use App\Salary;
use App\Image;
use Intervention\Image\Facades\Image as IntImage;
use Illuminate\Support\Facades\File;

class ControlPanelController extends Controller
{
    /**
     * ControlPanelController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *  Comments tab code block
     */

    /**
     * Get comments data for table
     * @param Request $request
     * @return array
     */
    public function getComments(Request $request)
    {
        $columns = array('name', 'email', 'comment', 'moderated', 'created_at');

        $recordsTotal = Comment::count();
        $recordsFiltered = $recordsTotal;

        $length = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $direction = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $data = Comment::offset($start)
                ->limit($length)
                ->orderBy($order, $direction)
                ->get();
        } else {
            $search = $request->input('search.value');

            $data = Comment::where('name', 'LIKE', "%{$search}%")
                ->orWhere('comment', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($length)
                ->orderBy($order, $direction)
                ->get();

            $recordsFiltered = Comment::where('name', 'LIKE', "%{$search}%")
                ->orWhere('comment', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->get(['id'])
                ->count();
        }

        $result = [
            'draw' => $request->input('draw'),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data,
        ];

        return $result;
    }


    /**
     * Set comment as moderated
     * @param Request $r
     * @return \Illuminate\Http\JsonResponse
     */
    public function setCommentModerated(Request $r)
    {
        $rec = Comment::find($r->input('id'));

        if ($rec) {
            if ($rec->moderated == true) {
                $rec->moderated = false;
            } else {
                $rec->moderated = true;
            }

            $rec->save();
        }

        $resp['status'] = 'success';

        return response()->json($resp, 200);
    }

    /**
     * Function for complete action events of comments Datatable
     * and return action status as JSON for AJAX request
     * @param Request $r
     * @return \Illuminate\Http\JsonResponse
     */
    public function actionComment(Request $r)
    {
        $action = $r->input('action');
        $inputData = $r->input('data');

        if ($action == 'create') {
            foreach ($inputData as $key => $value) {
                $rec = new Comment;

                $rec->name = $value['name'];
                $rec->email = $value['email'];
                $rec->comment = $value['comment'];
                $rec->moderated = $value['moderated'][0];
                $rec->save();
            }
        }

        if ($action == 'edit') {
            foreach ($inputData as $key => $value) {
                $rec = Comment::find($key);

                $rec->name = $value['name'];
                $rec->email = $value['email'];
                $rec->comment = $value['comment'];
                $rec->moderated = $value['moderated'][0];
                $rec->save();
            }
        }

        if ($action == 'remove') {
            foreach ($inputData as $rec) {
                $rec = Comment::find($rec['id']);
                $rec->delete();
            }
        }

        return response()->json([
            'data' => $rec,
            'status' => 'success',
        ], 200);
    }


    /**
     *  Contacts tab code block
     *
     * /**
     * Get data for contacts datatable
     * @param Request $request
     * @return array
     */
    public function getContacts(Request $request)
    {
        $columns = array('complete', 'name', 'email', 'phone', 'text', 'created_at');

        $recordsTotal = Contact::count();
        $recordsFiltered = $recordsTotal;

        $length = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $direction = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $data = Contact::offset($start)
                ->limit($length)
                ->orderBy($order, $direction)
                ->get(['id', 'complete', 'name', 'email', 'phone', 'text', 'created_at']);
        } else {
            $search = $request->input('search.value');

            $data = Contact::where('name', 'LIKE', "%{$search}%")
                ->orWhere('text', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('phone', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($length)
                ->orderBy($order, $direction)
                ->get(['id', 'complete', 'name', 'email', 'phone', 'text', 'created_at']);

            $recordsFiltered = Contact::where('name', 'LIKE', "%{$search}%")
                ->orWhere('text', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('phone', 'LIKE', "%{$search}%")
                ->get(['id'])
                ->count();
        }

        $result = [
            'draw' => $request->input('draw'),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data,
        ];

        return $result;
    }

    /**
     * Set contacts request as completed by manager
     * @param Request $r
     * @return \Illuminate\Http\JsonResponse
     */
    public function setContactCompleted(Request $r)
    {
        $rec = Contact::find($r->input('id'));

        if ($rec) {
            if ($rec->complete == true) {
                $rec->complete = false;
            } else {
                $rec->complete = true;
            }

            $rec->save();
        }

        $resp['status'] = 'success';

        return response()->json($resp, 200);
    }

    /**
     * Actions for contacts datatable and
     * return response as AJAX with status
     * @param Request $r
     * @return \Illuminate\Http\JsonResponse
     */
    public function actionContacts(Request $r)
    {
        $action = $r->input('action');
        $inputData = $r->input('data');

        if ($action == 'create') {
            foreach ($inputData as $key => $value) {
                $rec = new Contact;
                $rec->complete = $value['complete'][0];
                $rec->name = $value['name'];
                $rec->email = $value['email'];
                $rec->phone = $value['phone'];
                $rec->text = $value['text'];
                $rec->save();
            }
        }

        if ($action == 'edit') {
            foreach ($inputData as $key => $value) {
                $rec = Contact::find($key);
                $rec->complete = $value['complete'][0];
                $rec->name = $value['name'];
                $rec->email = $value['email'];
                $rec->phone = $value['phone'];
                $rec->text = $value['text'];
                $rec->save();
            }
        }

        if ($action == 'remove') {
            foreach ($inputData as $rec) {
                $rec = Contact::find($rec['id']);
                $rec->delete();
            }
        }

        return response()->json([
            'data' => $rec,
            'status' => 'success',
        ], 200);
    }


    /**
     *  Worker's tab code block
     */

    /**
     * Get data for workers datatable
     * @param Request $request
     * @return array
     */
    public function getWorkers(Request $request)
    {
        $columns = array('id', 'parent', 'first_name', 'last_name', 'position', 'salary', 'children', 'created_at');

        $recordsTotal = Person::count();
        $recordsFiltered = $recordsTotal;

        $length = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $direction = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $data = Person::join('persons_info', 'persons_info.person_id', '=', 'persons.id')
                ->join('salary', 'salary.id', '=', 'persons.salary_id')
                ->join('images', 'images.id', '=', 'persons_info.image_id')
                ->select(DB::raw('persons.*, first_name, last_name, image_id, salary.position, salary.salary, images.image_thumb'))
                ->offset($start)
                ->limit($length)
                ->orderBy($order, $direction)
                ->get();
        } else {
            $search = $request->input('search.value');

            $data = Person::join('persons_info', 'persons_info.person_id', '=', 'persons.id')
                ->join('salary', 'salary.id', '=', 'persons.salary_id')
                ->join('images', 'images.id', '=', 'persons_info.image_id')
                ->select(DB::raw('persons.*, first_name, last_name, image_id, salary.position, salary.salary, images.image_thumb'))
                ->where('persons.id', "{$search}")
                ->orWhere('first_name', 'LIKE', "%{$search}%")
                ->orWhere('last_name', 'LIKE', "%{$search}%")
                ->orWhere('salary', 'LIKE', "%{$search}%")
                ->orWhere('position', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($length)
                ->orderBy($order, $direction)
                ->get();

            $recordsFiltered = Person::join('persons_info', 'persons_info.person_id', '=', 'persons.id')
                ->join('salary', 'salary.id', '=', 'persons.salary_id')
                ->select(DB::raw('persons.id'))
                ->where('first_name', 'LIKE', "%{$search}%")
                ->orWhere('last_name', 'LIKE', "%{$search}%")
                ->get()
                ->count();
        }

        $result = [
            'draw' => $request->input('draw'),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data,
            'files' => [
                'files' => [

                ]
            ],
            'options' => [
                'columnDefs' => [
                    'orderable' => false,
                    'targets' => 0,
                ]
            ]
        ];

        foreach ($data as $rec) {
            $result['files']['files'][$rec->image_id]['id'] = $rec->image_id;
            $result['files']['files'][$rec->image_id]['web_path'] = $rec->image_thumb;
        }

        return response()->json($result);
    }

    /**
     *  Actions for workers datatable and
     * return AJAX request status
     * @param Request $r
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function actionWorkers(Request $r)
    {
        $action = $r->input('action');
        $inputData = $r->input('data');

        if ($action == 'create') {
            foreach ($inputData as $key => $value) {
                $rec = new Person;
                $rec->parent = $value['parent'];
                $rec->salary_id = $value['salary_id'];
                $rec->children = $value['children'][0];
                $recInfo = new PersonInfo;
                $recInfo->first_name = $value['first_name'];
                $recInfo->last_name = $value['last_name'];
                $recInfo->image_id = $value['image_id'];
                $rec->save();
                $rec->persons_info()->save($recInfo);
            }
        }

        if ($action == 'edit') {
            foreach ($inputData as $key => $value) {
                $rec = Person::with(['persons_info', 'salary', 'persons_info.image'])->find($key);
                $rec->parent = $value['parent'];
                $rec->salary_id = $value['salary_id'];
                $rec->children = $value['children'][0];
                $rec->persons_info->first_name = $value['first_name'];
                $rec->persons_info->last_name = $value['last_name'];
                $rec->persons_info->image_id = $value['image_id'];
                $rec->save();
                $rec->persons_info()->save($rec->persons_info);
            }
        }

        if ($action == 'remove') {
            foreach ($inputData as $rec) {
                $rec = Person::find($rec['id']);
                $rec->delete();
            }
        }

        /**
         * Upload files and response data structure
         * and uploaded files information for datatable
         * with AJAX status
         */
        if ($action == 'upload') {
            /*$this->validate($request, [
                'image' => 'required|image|mimes:jpeg,jpg|max:2048',
            ]);*/

            $img = new Image;
            $img->image_link = Storage::url($r->file('upload')->store('public/photos'));

            $uploadedFile = $r->file('upload');
            $uploadedFileName = str_random(24) . '.thumb' . '.' . $uploadedFile->getClientOriginalExtension();
            $uploadedDestination = 'public/photos/';

            $image_thumb = IntImage::make($uploadedFile)->resize(100, 100)->stream();
            Storage::put($uploadedDestination . $uploadedFileName, $image_thumb->__toString());
            $img->image_thumb = '/storage/photos/' . $uploadedFileName;

            $img->save();

            $response = [
                'data' => [],
                'files' => [
                    'files' => [
                        $img->id => [
                            'id' => $img->id,
                            'filename' => $r->file('upload')->getClientOriginalName(),
                            'filesize' => $r->file('upload')->getClientSize(),
                            'web_path' => $img->image_link,
                            'system_path' => ''
                        ]
                    ]
                ],
                'upload' => [
                    'id' => $img->id,
                ]
            ];

            return $response;
        }

        return response()->json([
            'data' => $rec,
            'status' => 'success',
        ], 200);
    }

    /**
     * Salary datatable action code block
     */

    /**
     * Get salary list for combobox dropdown menus
     * @return Collection
     */
    public function getSalaryList()
    {
        $salary = Salary::select(DB::raw('id, CONCAT(position, " (", salary, ")") as position_salary'))
            ->orderBy('position')->get();

        return $salary;
    }

    /**
     * Get data for salary datatable
     * @return mixed
     */
    public function getSalary(Request $request)
    {
        $columns = array('id', 'position', 'salary', 'created_at');

        $recordsTotal = Salary::count();
        $recordsFiltered = $recordsTotal;

        $length = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $direction = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $data = Salary::offset($start)
                ->limit($length)
                ->orderBy($order, $direction)
                ->get();
        } else {
            $search = $request->input('search.value');

            $data = Salary::where('position', 'LIKE', "%{$search}%")
                ->orWhere('salary', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($length)
                ->orderBy($order, $direction)
                ->get();

            $recordsFiltered = Salary::where('position', 'LIKE', "%{$search}%")
                ->orWhere('salary', 'LIKE', "%{$search}%")
                ->get(['id'])
                ->count();
        }

        $result = [
            'draw' => $request->input('draw'),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data,
        ];

        return $result;
    }

    /**
     * Actions for salary datatable
     * @param Request $r
     * @return \Illuminate\Http\JsonResponse
     */
    public function actionSalary(Request $r)
    {
        $action = $r->input('action');
        $inputData = $r->input('data');

        if ($action == 'create') {
            foreach ($inputData as $key => $value) {
                $rec = new Salary;
                $rec->position = $value['position'];
                $rec->salary = $value['salary'];
                $rec->save();
            }
        }

        if ($action == 'edit') {
            foreach ($inputData as $key => $value) {
                $rec = Salary::find($key);
                $rec->position = $value['position'];
                $rec->salary = $value['salary'];
                $rec->save();
            }
        }

        if ($action == 'remove') {
            foreach ($inputData as $rec) {
                $rec = Salary::find($rec['id']);
                $rec->delete();
            }
        }

        return response()->json([
            'data' => $rec,
            'status' => 'success',
        ], 200);
    }

    /**
     * Show UI view of control panel
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        return view('controlpanel', ['salarys' => $this->getSalaryList()]);
    }

    /**
     * Check password form credential and validate input form
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function adminCredentialRules(array $data)
    {
        $messages = [
            'old-password.required' => 'Please enter current password',
            'new-password.required' => 'Please enter new password',
            'new-password-confirm.required' => 'Please enter new password confirmation',
            'new-password-confirm.same' => 'New password and confirmation should be the same',
        ];

        $validator = Validator::make($data, [
            'old-password' => 'required',
            'new-password' => 'required|same:new-password',
            'new-password-confirm' => 'required|same:new-password',
        ], $messages);

        return $validator;
    }

    /**
     * Change admin password function
     * check credential and if confirm
     * change user password and show notify
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changePassword(Request $request)
    {
        if (Auth::Check()) {
            $requestData = $request->All();
            $validator = $this->adminCredentialRules($requestData);

            if ($validator->fails()) {
                return response()->json(array('error' => $validator->getMessageBag()));
            } else {
                $currentPassword = Auth::User()->password;

                if (Hash::check($requestData['old-password'], $currentPassword)) {
                    $user_id = Auth::User()->id;
                    $obj_user = User::find($user_id);
                    $obj_user->password = Hash::make($requestData['new-password']);;
                    $obj_user->save();

                    return response()->json(array('status' => 'success'));
                } else {
                    $error = array('old-password' => 'Please enter correct current password');

                    return response()->json(array('error' => $error));
                }
            }
        }
    }
}
