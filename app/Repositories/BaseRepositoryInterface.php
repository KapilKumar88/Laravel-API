<?php

namespace App\Repositories;


interface BaseRepositoryInterface
{
    
    public function create(array $attributes);

    public function update(array $attributes, $id);

    public function delete($id, array $conditions = []);

    public function find($id);

    public function findOrFail($id);

    public function all(array $columns = ['*']);

    public function get(array $conditions = [], array $columns = ['*']);

    public function exists(array $conditions): bool;

    public function first(array $conditions);
}













?>