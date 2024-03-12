<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserRequest;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        $users = $this->userRepository->getAll();
        return view('users.index', compact('users'));
    }
    public function create()
    {
    }
    public function store(CreateUserRequest $request)
    {
        $validatedData = $request->validated();
        $this->userRepository->create($validatedData);
        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }
    public function show(string $id)
    {
        $user = $this->userRepository->getById($id);
        return view('users.profile', [
            'user' => $user
        ]);
    }
    public function edit(string $id)
    {
    }
    public function update(Request $request, string $id): RedirectResponse
    {
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
