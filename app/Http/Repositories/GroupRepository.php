<?php


namespace App\Http\Repositories;

use App\Models\Group;
use Illuminate\Support\Facades\DB;

class GroupRepository extends Repository
{
    public function getAll()
    {
        return Group::all();
    }

    function findById($id)
    {
        return Group::findOrFail($id);
    }

    public function store($group)
    {
        DB::beginTransaction();
        try {
            $group->save();

        }catch (\Exception $exception) {
            DB::rollBack();
        }
    }
    public function delete($group)
    {
        $group->delete();
    }



}
