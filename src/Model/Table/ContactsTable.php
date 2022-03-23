<?php 

namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Class ContactsTable
 * @package App\Model\Table
 */
class ContactsTable extends Table
{
    /**
     * @param array $config
     */
    public function initialize(array $config) 
    {
        $this->belongsTo('Companies', [
            'className' => 'Companies',
            'foreignKey' => 'company_id'
        ]);
    }

    /**
     * @param Validator $validator
     * @return Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name');

        $validator
            ->requirePresence('phone_number', 'create')
            ->notEmptyString('phone_number');

        $validator
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->requirePresence('notes', 'create')
            ->notEmptyString('notes');

        $validator
            ->requirePresence('add_notes', 'create')
            ->notEmptyString('add_notes');

        $validator
            ->requirePresence('internal_notes', 'create')
            ->notEmptyString('internal_notes');

        $validator
            ->requirePresence('comments', 'create')
            ->notEmptyString('comments');

        return $validator;
    }
}

?>
