<?php
// Controller function example
public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'address' => 'required',
            'town' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|string|min:4|confirmed',
            'telefoni' => 'required',
        ]);
        $user = User::create([
            'emri' => $request->email,
            'adresa' => $request->address,
            'qyteti' => $request->town,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role' => 'admin',
        ]);
        return back();
    }

    // Controller function example updated with FormRequest
    public function store(SaveUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);
        
        $user = User::create($data);
        return back();
    }

// Route example
Route::get('seller', 'SellerController@index');
Route::post('seller', 'SellerController@store');
Route::get('seller/{seller}', 'SellerController@edit');
Route::patch('seller', 'SellerController@update');
