<?php

namespace App\Model\Table;
use Cake\ORM\Table;

/**
 * Class CompaniesTable
 * @package App\Model\Table
 */
class CompaniesTable extends Table
{
    /**
     * @param array $config
     */
    public function initialize(array $config) 
    {
        $this->hasMany('Contacts', [
            'className' => 'Contacts',
            'foreignKey' => 'company_id'
        ]);
    }
}

?>
