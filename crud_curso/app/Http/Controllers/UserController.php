<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = User::query();

        $query->when($request->has('search'), function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->query('search') . '%');
        });


        $products = $query
            ->paginate($request->query('per_page', 10))
            ->withQueryString();

        return $this->respondWithPaginate($products);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data  = $request->all();
        $request->validate([
            'phone' => ['required', 'string', 'max:255'],
            'mobile_phone' => ['required', 'string'],
        ]);

        if (!$request->has('password') || !$request->get('password')) {

            return response()->json(['message' => 'Unauthorized'], 401);
        }
        try {
            $data['password'] = bcrypt($data['password']);

            $user = User::create($data);

            $user->profile()->create(
                [
                    'phone' => $data['phone'],
                    'mobile_phone' => $data['mobile_phone']
                ]
            );

            return response()->json([
                'data' => [
                    'msg' => 'Usuário cadastrado com sucesso!'
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Não foi possível cadastrar o usuário..',
            ], 401);
        }
    }

    public function show($id)
    {
        try {
            $user = User::with('profile')->findOrFail($id);

            if (isset($user->profile) && isset($user->profile->social_networks)) {
                $socialNetworks = unserialize($user->profile->social_networks);
                $user->profile->social_networks = $socialNetworks;
            }

            return response()->json([
                'data' => $user
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 401);
        }
    }


    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
