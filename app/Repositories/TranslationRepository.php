<?php

namespace App\Repositories;

use App\Models\Translation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TranslationRepository
 * @package App\Repositories
 * @version March 7, 2018, 6:41 am UTC
 *
 * @method Translation findWithoutFail($id, $columns = ['*'])
 * @method Translation find($id, $columns = ['*'])
 * @method Translation first($columns = ['*'])
*/
class TranslationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'content'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Translation::class;
    }
}
