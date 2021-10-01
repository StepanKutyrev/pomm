<?php

namespace App\Model\Db\PublicSchema;

use PommProject\ModelManager\Model\Model;
use PommProject\ModelManager\Model\Projection;
use PommProject\ModelManager\Model\ModelTrait\WriteQueries;

use PommProject\Foundation\Where;

use App\Model\Db\PublicSchema\AutoStructure\Asd as AsdStructure;
use App\Model\Db\PublicSchema\Asd;

/**
 * AsdModel
 *
 * Model class for table asd.
 *
 * @see Model
 */
class AsdModel extends Model
{
    use WriteQueries;

    /**
     * __construct()
     *
     * Model constructor
     *
     * @access public
     */
    public function __construct()
    {
        $this->structure = new AsdStructure;
        $this->flexible_entity_class = '\App\Model\Db\PublicSchema\Asd';
    }
}
