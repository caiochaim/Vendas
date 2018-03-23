<?php

namespace App\Http\Services;

use App\Model\Person;
use App\Validators\ValidatePerson;

class PersonService
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getPeople()
    {
        return Person::all();
    }

    /**
     * @param $id
     * @return Person
     */
    public function getPerson($id)
    {
        $person = Person::find($id);
        return $person;
    }

    /**
     * @param array $personRequest
     * @return string
     */
    public function createPerson(array $personRequest)
    {
        ValidatePerson::validateFields($personRequest);

        $person = new Person();
        $person->fillable(["name", "cpf", "birthDate"])->fill($personRequest);

        $person->save();

        return 'Cliente cadastrado com sucesso!';
    }

    /**
     * @param $data
     * @param $id
     * @return string
     */
    public function updatePerson($data, $id)
    {
        ValidatePerson::validateFields($data);

        $person = Person::find($id);
        $person->fill($data);
        $person->save();

        return 'Cliente alterado com sucesso!';
    }

    /**
     * @param $id
     * @return string
     */
    public function destroyPerson($id)
    {
        $person = Person::find($id);

        ValidatePerson::validateFields($person);

        return json_encode($person->delete(), 204);
    }
}