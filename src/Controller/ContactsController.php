<?php 
namespace App\Controller;

use Cake\Http\Exception\BadRequestException;
use Cake\Http\Exception\HttpException;
use Cake\Http\Exception\InternalErrorException;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;

class ContactsController extends AppController 
{

    /**
     * Index method
     *
     * @return Response
     */
    public function index()
    {
        $contacts = $this->paginate($this->Contacts, [
            'fields' => ['id', 'first_name', 'last_name', 'phone_number']
        ]);
        
        $this->set(compact('contacts'));
        $this->set('_serialize', ['contacts']);
    }

    /**
     * index_ext method
     *
     * @return Response
     */
    public function index_ext()
    {
        $contacts = $this->paginate($this->Contacts, [
            'hyderate' => false,
            'fields' => ['id', 'first_name', 'last_name', 'phone_number'],
            'contain' => [
                    'Companies' => ['fields' => ['id', 'company_name', 'address']
                ]
            ]
        ]);
        
        $this->set(compact('contacts'));
        $this->set('_serialize', ['contacts']);
    }

    /**
     * add method
     *
     * @return void | Response
     */
    public function add()
    {
        // Validate the incoming data to this api and create entity
        $contact = $this->Contacts->newEntity($this->request->getData());
        $errors = $contact->getErrors();
        if ($errors) { //if errors return error
            throw new HttpException(json_encode($errors), 400);
        }

        // Save to database and return response
        $contactTable = TableRegistry::get("Contacts");
        if (!$contact = $contactTable->save($contact)) {
            throw new InternalErrorException('Failed to save the data' . json_encode($contact->errors()));
        }

        $this->set(compact('contact'));
        $this->set('_serialize', ['contact']);
    }
}

?>
