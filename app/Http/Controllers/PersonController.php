<?php

namespace App\Http\Controllers;

use App\Http\Services\PersonService;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    protected $personService;

    public function __construct()
    {
        $this->personService = new PersonService();
    }

    /**
     * Display a listing of the resource.
     */
    public function getPeople()
    {
        $result = $this->personService->getPeople();
        return json_encode($result);
    }

    /**
     * Display the specified resource.
     * @param $id
     * @return string
     */
    public function getPerson($id)
    {
        $result = $this->personService->getPerson($id);
        return json_encode($result);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return string
     */
    public function createPerson(Request $request)
    {
        $result = $this->personService->createPerson($request->all());
        return $result;
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param $id
     * @return string
     */
    public function updatePerson(Request $request, $id)
    {
        $data = $request->all();

        $result = $this->personService->updatePerson($data, $id);
        return $result;
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return string
     */
    public function destroyPerson($id)
    {
        $result = $this->personService->destroyPerson($id);
        return $result;
    }
}
