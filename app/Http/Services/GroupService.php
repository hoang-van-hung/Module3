<?php


namespace App\Http\Services;

use App\Http\Repositories\GroupRepository;
use App\Models\Group;
use Illuminate\Testing\Fluent\Concerns\Has;

class GroupService
{
    protected $groupRepo;

    public function __construct(GroupRepository $groupRepository)
    {
        $this->groupRepo= $groupRepository;

    }

    public function getAll()
    {
        return $this->groupRepo->getAll();
    }

    public function findById($id)
    {
        return $this->groupRepo->findById($id);
    }

    public function store($request)
    {
        $group = new Group();
        $group->fill($request->all());
        $this->groupRepo->store($request);
    }

    public function edit()
    {

    }

    public function update($id, $request)
    {
        $group = $this->groupRepo->findById($id);
        $group->fill($request->all());
        $this->groupRepo->store($group);
    }

    public function delete($id)
    {
        $group = $this->groupRepo->findById($id);
        $this->groupRepo->delete($group);
    }


}
