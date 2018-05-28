<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Person;

class WorkersController extends Controller
{
    private $searchResult = [];

    public function show()
    {
        return view('workers');
    }

    public function getNode(Request $request)
    {
        return Person::join('persons_info', 'persons_info.person_id', '=', 'persons.id')
            ->join('salary', 'salary.id', '=', 'persons.salary_id')
            ->join('images', 'images.id', '=', 'persons_info.image_id')
            ->select(DB::raw('persons.id, persons.parent, persons.children, persons.created_at,
                            CONCAT(persons_info.first_name, \' \' , persons_info.last_name) AS text,
                            salary.position, salary.salary, images.image_link '))
            ->where('persons.parent', $request->input('id'))
            ->get();
    }

    public function getMass(Request $r)
    {
        $intIDs = array_map('intval', explode(',', $r->get('ids')));

        $result = [];

        foreach ($intIDs as $id) {
            $r['id'] = $id;
            $result [$id] = $this->getNode($r);
        }

        return response()->json($result);
    }

    public function searchIDsRecursive($items)
    {
        foreach ($items as $item) {
            array_push($this->searchResult, $item['id']);

            $tmp = $item['parents'];

            if (isset($tmp)) {
                $this->searchIDsRecursive(array($tmp));
            } else return;
        }
    }

    public function searchItems(Request $request)
    {
        $search = $request->input('str');

        $data = Person::join('persons_info', 'persons_info.person_id', '=', 'persons.id')
            ->with('parents')
            ->select(DB::raw('persons.id, persons.parent'))
            ->where('first_name', 'LIKE', "%{$search}%")
            ->orWhere('last_name', 'LIKE', "%{$search}%")
            ->get();

        $this->searchIDsRecursive($data->toArray());

        $this->searchResult = array_unique($this->searchResult);
        $this->searchResult = array_sort($this->searchResult);

        return array_values($this->searchResult);
    }
}
