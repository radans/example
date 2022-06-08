<?php

public function store(Request $request)
    {
        $request->validate([
            'emri' => 'required',
            'adresa' => 'required',
            'qyteti' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|string|min:4|confirmed',
            'telefoni' => 'required',
        ]);
        $shitesi = User::create([
            'emri' => $request->emri,
            'adresa' => $request->adresa,
            'qyteti' => $request->qyteti,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telefoni' => $request->telefoni,
            'niveli' => 'admin',
        ]);
        return back();

    }
