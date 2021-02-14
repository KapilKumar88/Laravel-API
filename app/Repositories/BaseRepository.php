<?php

namespace App\Repositories;

use App\Repositories\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    /**
     * Base repository contructor
     * create new model instance
     * 
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * create new model in database
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes){
        return $this->model->create($attributes);
    }

    /**
     * update new model in database
     * @param array $attributes
     * @param int $id
     * 
     */
    public function update(array $attributes, $id){
        $record =  $this->find($id);
        return $record->update($attributes);
    }

    /**
     * delete the model
     * @param int $id
     * @param array $conditions [optional] example ['key' => 'value', 'key1' => 'value1']
     * @return 
     */
    public function delete($id, array $conditions = []){
        $query = $this->model;
        if(!empty($conditions)){
            foreach ($conditions as $key => $value) {
                $query = $query->where($key, $value);
            }
        }
        return $query->destroy($id);
    }

    /**
     * find the model
     * @param $id
     * @return Model
     */
    public function find($id){
        return $this->model->find($id);
    }

    /**
     * Find the model or throw exception
     * @param $id
     * @return model
     */
    public function findOrFail($id){
        return $this->model->findOrFail($id);
    }

    /**
     * get all model from database
     * @param array $columns [optional] example ['col1', 'col2']
     * @return
     */
    public function all(array $columns = ['*']){
        return $this->model->all($columns);
    }

    /**
     * 
     * @param array $conditions [optional] example ['key' => 'value', 'key1' => 'value1']
     * @param array $columns [optional] example ['col1', 'col2']
     * @return 
     */
    public function get(array $conditions = [], array $columns = ['*']){
        $query = $this->model;
        if(!empty($conditions)){
            foreach ($conditions as $key => $value) {
                $query = $query->where($key, $value);
            }
        }

        return $query->get($columns);

    }

    /**
     * check particular record exists in storage or not
     * @param array $conditions example ['key' => 'value', 'key1' => 'value1']
     * @return boolean
     */
    public function exists(array $conditions): bool{
        $query = $this->model;
        foreach ($conditions as $key => $value) {
            $query = $query->where($key, $value);
        }

        return $query->exists();
    }

    /**
     * get the first element from the storage
     * @param array $conditions example ['key' => 'value', 'key1' => 'value1']
     * @return Model
     */
    public function first(array $conditions){
        $query = $this->model;
        foreach ($conditions as $key => $value) {
            $query = $query->where($key, $value);
        }

        return $query->first();
    }
}



?>