<?php

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
