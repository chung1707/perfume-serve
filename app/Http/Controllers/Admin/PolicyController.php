<?php

namespace App\Http\Controllers\Admin;

use App\Models\policy;
use App\Models\AppConst;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePolicyRequest;
use App\Http\Requests\UpdatePolicyRequest;

class PolicyController extends Controller
{
    public function getPolicies(Request $request)
    {
        $policyQuery = policy::latest();
        if ($request[0]) {
            $key = $request[0];
            $policyQuery = $policyQuery->where('title', 'LIKE', "%$key%");
        }
        $policies = $policyQuery->paginate(AppConst::DEFAULT_PER_ADMIN_PAGE);
        $policies->load('user');
        return response()->json($policies);
    }
    public function store(StorePolicyRequest $request)
    {
        $policy = new policy;
        $policy->fill($request->all());
        $policy->user_id = auth('sanctum')->user()->id;
        $policy->save();
        return response()->json(['success' => true]);
    }
    public function update(UpdatePolicyRequest $request, $id)
    {
        $policy =  policy::find($id);
        $policy->update($request->all());
        return response()->json(['success' => true]);
    }
    public function show($id)
    {
        $policy = policy::find($id);
        return response()->json($policy);
    }
    public function delete($id)
    {
        try {
            $policy = policy::find($id);
            $policy->delete();
            return response()->json(['status' => 201, 'name' => $policy->name]);
        } catch (\Exception $e) {
            return response()->json(['status' => 401, 'error' => $e]);
        }
    }
}
