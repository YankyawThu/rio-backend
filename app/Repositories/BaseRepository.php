<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->orderBy('id', 'DESC')->get();
    }

    public function getLimit($limit)
    {
        return $this->model->orderBy('id', 'DESC')->take($limit)->get();
    }

    public function getById($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function getPaginated($page = null)
    {
        return $this->model->orderBy('id', 'DESC')->paginate($page ? $page : config('enums.itemPerPage'));
    }

    public function getPaginatedWithFilter($page = null, $filter)
    {
        return $this->model->filter($filter)->orderBy('id', 'DESC')->paginate($page ?? config('enums.itemPerPage'));
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function firstOrCreate(array $data)
    {
        return $this->model->firstOrCreate($data);
    }

    public function update(array $data, $id)
    {
        $result = $this->getById($id);
        $result->fill($data);

        return $result->push();
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}
