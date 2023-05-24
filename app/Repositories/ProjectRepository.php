<?php

namespace App\Repositories;


use A17\Twill\Repositories\ModuleRepository;
use App\Models\Project;

class ProjectRepository extends ModuleRepository
{


    public function __construct(Project $model)
    {
        $this->model = $model;
    }


    public function afterSave($model, $fields): void
    {
        $this->updateRepeater(
            $model,
            $fields,
            'links',
        );

        parent::afterSave($model, $fields);
    }


    public function getFormFields($object): array
    {
        $fields = parent::getFormFields($object);

        return $this->getFormFieldsForRepeater(
            $object,
            $fields,
            'links',
            'Link',
            'links',
        );

//        return $fields;
    }


}
