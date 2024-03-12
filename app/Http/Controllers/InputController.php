<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\Status;


class InputController extends Controller
{
    public function handleRequest(Request $request)
    {
        $allInput = $request->all();

        // Retrieve a subset of input data as collection
        $userCollection = $request->collect('users');
        // Retrieve specific input value with default
        $name = $request->input('name', 'Default Name');

        // Retrieve input from query string with default
        $queryStringName = $request->query('name', 'Query String Default');

        // Retrieve JSON input values
        $jsonUserName = $request->input('user.name');

        // Retrieve Stringable input value
        $stringableName = $request->string('name')->trim();

        // Retrieve Boolean input values
        $isArchived = $request->boolean('archived');

        // Retrieve Date input values
        $birthday = $request->date('birthday', 'Y-m-d');
        // Access input using dynamic properties
        $dynamicName = $request->name;

        // Determine if value is present on the request
        $hasName = $request->has('name');

        // Flash input to the session
        $request->flash();

        // Optionally, merge additional input
        $request->merge(['votes' => 0]);

        // Work with old input
        $oldUsername = $request->old('username');

        // Returning a response just for demonstration purposes
        return response()->json([
            'allInput' => $allInput,
            'name' => $name,
            'queryStringName' => $queryStringName,
            'jsonUserName' => $jsonUserName,
            'stringableName' => $stringableName,
            'isArchived' => $isArchived,
            'birthday' => $birthday?->toDateString(),
            'dynamicName' => $dynamicName,
            'hasName' => $hasName,
            'oldUsername' => $oldUsername,
        ]);
    }
}
