<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * BaseRepository - It should be extended when creating Repository.
 */
abstract class BaseRepository implements RepositoryInterface
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repository
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    // Get the associated model
    public function getModel()
    {
        return $this->model;
    }

    // Set the associated model
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Returns Record from tht database.
     *
     * @return \Illuminate\Database\Eloquent\Collection|Model[]
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Creates a record from the database.
     *
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Updates record by Id.
     *
     * @param array $data
     * @param $id
     *
     * @return mixed
     */
    public function update(array $data, $id)
    {
        $record = $this->model->find($id);

        return $record->update($data);
    }

    /**
     * Deletes record by Id.
     *
     * @param $id
     *
     * @return int
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * Finds record by given id.
     *
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * It return the record by given given id.
     *
     * @param $relations
     *
     * @return \Illuminate\Database\Eloquent\Builder|Model
     */
    public function with($relations)
    {
        return $this->model->with($relations);
    }
    /**
     * Get record by Coulmn.
     *
     * @param $column string
     * @param $$value string
     *
     * @return mixed
     */
    public function where($column, $value)
    {
        return $this->model->where($column, $value);
    }
    
    /**
     * Get Single record by Coulmn.
     *
     * @param $column string
     * @param $$value string
     *
     * @return mixed
     */
    public function findByColumn($column, $value)
    {
        return $this->model->where($column, $value)->first();
    }

    /**
     * Get all record by Coulmn.
     *
     * @param $column string
     * @param $$value string
     *
     * @return mixed
     */
    public function findAllByColumn($column, $value)
    {
        return $this->model->where($column, $value)->get();
    }

    /**
     * Get records my multiple columns.
     *
     * @param $data array
     *
     * @return mixed
     */

    public function findAllByColumns($data)
    {
        return $this->model->where($data)->get();
    }

    /**
     * Get limited records.
     *
     * @param $limit int
     *
     * @return mixed
     */
    public function paginate($limit)
    {
        return $this->model->paginate($limit);
    }
}
